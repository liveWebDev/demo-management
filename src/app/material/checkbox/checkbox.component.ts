import { Component, OnInit } from '@angular/core';

export interface Task {
  name: string;
  completed: boolean;
  subtasks?: Task[];
}

@Component({
  selector: 'app-checkbox',
  templateUrl: './checkbox.component.html',
  styleUrls: ['./checkbox.component.scss']
})
export class CheckboxComponent {

  isIndeterminate = false;
  isChecked = false;
  isDisabled = false;
  alignment = 'start';
  useAlternativeColor = false;

  constructor() {}

  printResult() {
    if (this.isIndeterminate) {
      return 'Maybe!';
    }
    return this.isChecked ? 'Yes!' : 'No!';
  }

  checkboxColor() {
    return this.useAlternativeColor ? 'primary' : 'accent';
  }
}

@Component({
  selector: 'app-md-checkbox-demo-nested-checklist',
  styles: [`
    li {
      margin-bottom: 4px;
    }
  `],
  templateUrl: './nested-checklist.html',
})
export class MdCheckboxDemoNestedChecklistComponent {
  tasks: Task[] = [{
    name: 'Reminders',
    completed: false,
    subtasks: [{
      name: 'Cook Dinner',
      completed: false
    }, {
      name: 'Read the Material Design Spec',
      completed: false
    }, {
      name: 'Upgrade Application to Angular2',
      completed: false
    }]
  }, {
    name: 'Groceries',
    completed: false,
    subtasks: [{
      name: 'Organic Eggs',
      completed: false
    }, {
      name: 'Protein Powder',
      completed: false
    }, {
      name: 'Almond Meal Flour',
      completed: false
    }]
  }];

  allComplete(task: Task): boolean {
    const subtasks = task.subtasks;
    return subtasks.every(t => t.completed) ? true : subtasks.every(t => !t.completed) ? false : task.completed;
  }

  someComplete(tasks: Task[]): boolean {
    const numComplete = tasks.filter(t => t.completed).length;
    return numComplete > 0 && numComplete < tasks.length;
  }

  setAllCompleted(tasks: Task[], completed: boolean) {
    tasks.forEach(t => t.completed = completed);
  }
}
