<label class="checkbox-inline">
  <input type="checkbox" data-id="{!! encrypt($users->id) !!}" data-toggle="toggle" class="toggle-button-user" @if($users->active == 1) checked @endif>
</label>