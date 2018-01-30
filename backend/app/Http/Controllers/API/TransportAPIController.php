<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransportAPIRequest;
use App\Http\Requests\API\UpdateTransportAPIRequest;
use App\Mail\TransportReport;
use App\Models\Shipment;
use App\Models\Transport;
use App\Repositories\ForkliftRepository;
use App\Repositories\ShipmentRepository;
use App\Repositories\TransportRepository;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TransportController
 * @package App\Http\Controllers\API
 */

class TransportAPIController extends AppBaseController
{
    /** @var  TransportRepository */
    private $transportRepository;

    public function __construct(TransportRepository $transportRepo)
    {
        $this->transportRepository = $transportRepo;
    }
    
    
    public function sendCount($count,$from){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://erbium-socket.herokuapp.com/addnewrecords?socket_id=erbiumsocket123&not_started='.$count.'&from='.$from);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $responses = curl_exec($ch);
        curl_close($ch);
    }
    
    
    /**
     * Display a listing of the Transport.
     * GET|HEAD /transports
     *
     * @param Request               $request
     * @param \App\Models\Transport $transport
     *
     * @return \Response
     */
    public function index(Request $request, Transport $transport)
    {
        //\DB::connection()->enableQueryLog();
        //$this->transportRepository->pushCriteria(new RequestCriteria($request));
        //$this->transportRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transports = $transport->with(['shipment', 'forklift']);
    
        if ($request->has('shipement')) {
            $transports->whereHas('shipment', function($q) use ( $request )
            {
                $q->where('shipment_id', $request->input('shipement'));
            });
        }
        if ($request->has('adr')) {
            $transports->where('adr', $request->input('adr'));
        }
        if ($request->has('created_at')) {
            $transports->orderBy('created_at', $request->input('created_at'));
        }
        
        if ( \Auth::user()->hasRole( 'transport-officer' ) ) {
            
            $transports->whereHas('forklift', function($q) use ( $request )
            {
                $q->orWhereIn('prozess', [0,1,2,3,4]);
            });
            
        }elseif (\Auth::user()->hasRole( 'forklift-driver' )){
            
            $transports->whereHas('forklift', function($q) use ( $request )
            {
                $q->orWhereIn('prozess', [0,1,2,3,4]);
            });
            $transports->whereIn('forklift_id', [0, \Auth::id()]);
    
        }
        //d($transports->toSql());
        $transports_result = $transports->paginate(20);
    
        $count = $transports->where('forklift_id', 0)->count();
        $this->sendCount($count,'all');
        
        return $this->sendResponse($transports_result, 'Transports retrieved successfully');
    } 

    /**
     * Store a newly created Transport in storage.
     * POST /transports
     *
     * @param CreateTransportAPIRequest $request
     * @param ShipmentRepository $shipmentRepository
     *
     * @return Response
     */
    public function store(CreateTransportAPIRequest $request, ShipmentRepository $shipmentRepository)
    {
        $input = $request->all();

        $transports = $this->transportRepository->create($input);
        $shipment_id = $request->input('shipment_id');
        if (count($shipment_id) > 0) {
            foreach ( $shipment_id as $shipment ) {
                $shipmentRepository->create( array( 'transport_id' => $transports->id, 'shipment_id' => $shipment ) );
            }
        }
        $transport = $this->transportRepository->with(['shipment'])->findWithoutFail($transports->id);
    
        $transports = $this->transportRepository->all();
        $count = $transports->where('forklift_id', 0)->count();
        
        $client = new \GuzzleHttp\Client();
        $client->get('https://erbium-socket.herokuapp.com/addnewrecords?socket_id=erbiumsocket123');
        $client->get('https://erbium-socket.herokuapp.com/addnewrecords?socket_id=erbiumsocket123&not_started='.$count);
        
        return $this->sendResponse($transport, 'Transport saved successfully');
    }

    /**
     * Display the specified Transport.
     * GET|HEAD /transports/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Transport $transport */
        $transport = $this->transportRepository->with(['shipment', 'forklift'])->findWithoutFail($id);

        if (empty($transport)) {
            return $this->sendError('Transport not found');
        }

        return $this->sendResponse($transport->toArray(), 'Transport retrieved successfully');
    }
    
    /**
     * Display the specified Transport.
     * GET|HEAD /transports/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function showForklift($id)
    {
        /** @var Transport $transport */
        $transport = $this->transportRepository->with(['forklift', 'forklift.image'])->findWithoutFail($id);

        if (empty($transport)) {
            return $this->sendError('Transport not found');
        }

        return $this->sendResponse($transport->forklift, 'Transport retrieved successfully');
    }

    /**
     * Update the specified Transport in storage.
     * PUT/PATCH /transports/{id}
     *
     * @param  int $id
     * @param UpdateTransportAPIRequest $request
     * @param Shipment $shipment
     * @param ShipmentRepository $shipmentRepository
     *
     * @return Response
     */
    public function update($id, UpdateTransportAPIRequest $request, Shipment $shipment, ShipmentRepository $shipmentRepository)
    {
        
        $input = $request->all();

        /** @var Transport $transport */
        $transport = $this->transportRepository->with(['shipment', 'forklift'])->findWithoutFail($id);

        if (empty($transport)) {
            return $this->sendError('Transport not found');
        }
        $shipment->where(['transport_id' => $id])->delete();
        
        $transport = $this->transportRepository->update($input, $id);
        $shipment_id = $request->input('shipment_id');
        if (count($shipment_id) > 0) {
            foreach ($shipment_id as $shipment) {
                $shipmentRepository->create( array( 'transport_id' => $id, 'shipment_id' => $shipment ) );
            }
        }
        $transport = $this->transportRepository->with(['shipment'])->findWithoutFail($id);
    
    
        return $this->sendResponse($transport, 'Transport updated successfully');
    }
    
    
    /**
     * Update the specified Transport in storage.
     * PUT/PATCH /transports/{id}
     *
     * @param  int                                 $id
     * @param Request                              $request
     *
     * @param \App\Repositories\ForkliftRepository $forkliftRepository
     *
     * @return \Response
     */
    public function updateTransportPickNStart($id, Request $request, ForkliftRepository $forkliftRepository)
    {
        
        $input = $request->all();

        /** @var Transport $transport */
        $transport = $this->transportRepository->with(['shipment', 'forklift'])->findWithoutFail($id);
        if (empty($transport)) {
            return $this->sendError( 'Transport not found');
        }
        if (!empty($transport->forklift_id) && $transport->forklift_id != 0) {
            return $this->sendError( 'Transport already start please chose any other transport.');
        }
        if (empty($transport->forklift)){
            $forkliftRepository->create(['transport_id' => $id]); // create forklift against transport
        }
        $this->transportRepository->update(['forklift_id' => $input['forklift_id']], $id);
        $transport = $this->transportRepository->with(['shipment', 'forklift'])->findWithoutFail($id);
    
        return $this->sendResponse($transport, 'Transport updated successfully');
    }
    
    /**
     * Update the specified Transport in storage.
     * PUT/PATCH /transports/{id}
     *
     * @return \Response
     */
    public function getTransportNotStart()
    {
        /** @var Transport $transport */
        $transport = $this->transportRepository->all();
        $count = $transport->where('forklift_id', 0)->count();
        
        return $this->sendResponse($count, 'Transport count successfully');
    }
    
    /**
     * Update the specified Transport in storage.
     * PUT/PATCH /transports/{id}
     *
     * @param  int $id
     * @param Request $request
     *
     * @return Response
     */
    public function updateTransportRampe($id, Request $request)
    {
        
        $input = $request->all();
        
        /** @var Transport $transport */
        $transport = $this->transportRepository->with(['forklift'])->findWithoutFail($id);
        if (empty($transport)) {
            return $this->sendError('Transport not found');
        }
        
        $transport = $this->transportRepository->update(['rampe' => $input['rampe']], $id);
        
        return $this->sendResponse($transport, 'Transport rampe updated successfully');
    }
    
    /**
     * Update the specified Transport in storage.
     * PUT/PATCH /transports/send/report/{id}
     *
     * @param  int $id
     * @param Request $request
     *
     * @return Response
     */
    public function postSendReport($id, Request $request)
    {
        
        $input = $request->all();
        
        /** @var Transport $transport */
        $transport = $this->transportRepository->with(['forklift', 'forklift.image', 'shipment'])->findWithoutFail($id);
        if (empty($transport)) {
            return $this->sendError('Transport not found');
        }
    
        \Mail::to($request->input('email'))->send(new TransportReport($transport));
        
        return $this->sendResponse($transport, 'Transport report sent successfully');
    }
    
    /**
     * Remove the specified Transport from storage.+
     * DELETE /transports/{id}
     *
     * @param  int $id
     * @param  Shipment $shipment
     *
     * @return Response
     */
    public function destroy($id, Shipment $shipment)
    {
        /** @var Transport $transport */
        $transport = $this->transportRepository->findWithoutFail($id);
        if (empty($transport)) {
            return $this->sendError('Transport not found');
        }
        $shipment->where(['transport_id' => $id])->delete();
        
        $transport->delete();

        return $this->sendResponse($id, 'Transport deleted successfully');
    }
    
    public function getRampe(){
        return [
            1 => 'Rampe 1',
            2 => 'Rampe 2',
            3 => 'Rampe 3',
            4 => 'Rampe 4',
            5 => 'Rampe 5',
            6 => 'Rampe 6',
            7 => 'Rampe 7',
            8 => 'Rampe 8',
            9 => 'Rampe 9',
            10 => 'Rampe 10',
        ];
    }
    
    
    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProcess($id){
        /** @var Transport $transport */
        $transport = $this->transportRepository->with(['forklift'])->findWithoutFail($id);
        if (empty($transport)) {
            return $this->sendError('Transport not found');
        }
        return $this->sendResponse($transport, 'Transport updated successfully');
    }
    
    /**
     * @param $id
     * @param PDF $PDF
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function getReport( $id, PDF $PDF )
    {
        
        /** @var Booking $booking */
        $transport = $this->transportRepository->with(['forklift', 'forklift.image', 'shipment'])->findWithoutFail($id);
        
        if ( empty( $transport ) ) {
            return $this->sendError( 'Transport not found' );
        }
        
        
        return $PDF->loadView( 'pdf.transport-report', [
            'content' => $transport,
            'sign' => '',
            'name' => 'transport-report'
        ] )->setPaper('a4')->stream();
    }
    
}
