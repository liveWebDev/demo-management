import { Injectable } from '@angular/core';

export interface BadgeItem {
  type: string;
  value: string;
}

export interface ChildrenItems {
  state: string;
  name: string;
  type?: string;
}

export interface Menu {
  state: string;
  name: string;
  type: string;
  icon: string;
  badge?: BadgeItem[];
  children?: ChildrenItems[];
}

const MENUITEMS = [
  {
    state: 'home',
    name: 'Dashboard',
    type: 'link',
    icon: 'explore'
  },
  {
    state: 'apps',
    name: 'APPS',
    type: 'sub',
    icon: 'apps',
    badge: [
      {type: 'red', value: '5'}
    ],
    children: [
      {state: 'calendar', name: 'CTC/ADR'},
      {state: 'calendar', name: 'CALENDAR'},
      {state: 'media', name: 'MEDIA'},
      {state: 'messages', name: 'MESSAGES'},
      {state: 'social', name: 'SOCIAL'},
      {state: 'chat', name: 'CHAT'}
    ]
  },
  {
    state: 'material',
    name: 'Management',
    type: 'sub',
    icon: 'face',
    badge: [
      {type: 'purple', value: '10'}
    ],
    children: [
      {state: 'button', name: 'Manage entities'},
      {state: 'cards', name: 'New Entity'},
      {state: 'select', name: 'Manage roles'},
      {state: 'autocomplete', name: 'New Role'},
      {state: 'input', name: 'Manage users'},
      {state: 'checkbox', name: 'New User'},
      {state: 'radio', name: 'Report Metrics'}
    ]
  },
  {
    state: 'material',
    name: 'Performance',
    type: 'sub',
    icon: 'equalizer',
    badge: [
      {type: 'purple', value: '10'}
    ],
    children: [
      {state: 'button', name: 'Overall Process'},
      {state: 'cards', name: 'Transport Manager'},
      {state: 'select', name: 'Forklift Driver'}
    ]
  },
  {
    state: 'dragndrop',
    name: 'Reports',
    type: 'sub',
    icon: 'show_chart',
    children: [
      {state: 'button', name: 'Wibe Metrics'}
    ]
  },
  {
    state: 'http://primer.nyasha.me/docs',
    name: 'DOCS',
    type: 'extTabLink',
    icon: 'local_library'
  },
  {
    state: 'dragndrop',
    name: 'Support',
    type: 'link',
    icon: 'pages',
  },
  {
    state: 'material',
    name: 'Material',
    type: 'sub',
    icon: 'face',
    badge: [
      {type: 'purple', value: '10'}
    ],
    children: [
      {state: 'button', name: 'BUTTON'},
      {state: 'cards', name: 'CARDS'},
      {state: 'select', name: 'SELECT'},
      {state: 'autocomplete', name: 'AUTOCOMPLETE'},
      {state: 'input', name: 'INPUT'},
      {state: 'checkbox', name: 'CHECKBOX'},
      {state: 'radio', name: 'RADIO'},
      {state: 'toolbar', name: 'TOOLBAR'},
      {state: 'lists', name: 'LISTS'},
      {state: 'grid', name: 'GRID'},
      {state: 'progress', name: 'PROGRESS'},
      {state: 'tabs', name: 'TABS'},
      {state: 'switch', name: 'SWITCH'},
      {state: 'tooltip', name: 'TOOLTIP'},
      {state: 'menu', name: 'MENU'},
      {state: 'slider', name: 'SLIDER'},
      {state: 'snackbar', name: 'SNACKBAR'},
      {state: 'dialog', name: 'DIALOG'}
    ]
  },
  {
    state: 'widgets',
    name: 'WIDGETS',
    type: 'link',
    icon: 'photo'
  },
  {
    state: 'forms',
    name: 'FORMS',
    type: 'sub',
    icon: 'looks_3',
    children: [
      {state: 'editor', name: 'EDITOR'},
      {state: 'validation', name: 'VALIDATION'},
      {state: 'upload', name: 'UPLOAD'},
      {state: 'tree', name: 'TREE'},
    ]
  },
  {
    state: 'tables',
    name: 'TABLES',
    type: 'sub',
    icon: 'format_line_spacing',
    badge: [
      {type: 'blue-grey', value: '8'
      }
    ],
    children: [
      {state: 'fullscreen', name: 'FULLSCREEN'},
      {state: 'editing', name: 'EDITING'},
      {state: 'filter', name: 'FILTER'},
      {state: 'paging', name: 'PAGING'},
      {state: 'sorting', name: 'SORTING'},
      {state: 'pinning', name: 'PINNING'},
      {state: 'selection', name: 'SELECTION'},
    ]
  },
  {
    state: 'charts',
    name: 'CHARTS',
    type: 'link',
    icon: 'show_chart',
  },
  {
    state: 'maps',
    name: 'MAPS',
    type: 'sub',
    icon: 'navigation',
    badge: [
      {type: 'green', value: 'new'
      }
    ],
    children: [
      {state: 'google', name: 'GOOGLE'},
      {state: 'leaflet', name: 'LEAFLET'}
    ]
  },
  {
    state: 'dragndrop',
    name: 'DND',
    type: 'link',
    icon: 'show_chart',
  },
  {
    state: 'pages',
    name: 'PAGES',
    type: 'sub',
    icon: 'pages',
    children: [
      {state: 'invoice', name: 'INVOICE'},
      {state: 'timeline', name: 'TIMELINE'},
      {state: 'user', name: 'USER'},
      {state: 'blank', name: 'BLANK'},
      {state: 'pricing', name: 'PRICING'},
    ]
  },
  {
    state: 'session',
    name: 'SESSION',
    type: 'sub',
    icon: 'face',
    children: [
      {state: '404', name: '404'},
      {state: 'error', name: 'ERROR'},
      {state: 'signin', name: 'SIGNIN'},
      {state: 'signup', name: 'SIGNUP'},
      {state: 'forgot', name: 'FORGOT'},
      {state: 'lockscreen', name: 'LOCKSCREEN'},
    ]
  }
];

@Injectable()
export class MenuItems {
  getAll(): Menu[] {
    return MENUITEMS;
  }

  add(menu: Menu) {
    MENUITEMS.push(menu);
  }
}