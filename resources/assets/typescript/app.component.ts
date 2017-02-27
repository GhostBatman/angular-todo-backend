import {Component, OnInit} from '@angular/core';
import {TaskListService} from './task.list.service';
import 'rxjs/add/operator/map'

@Component({
    selector: 'main',
    providers: [TaskListService],
    templateUrl: 'main/index.html'
})
export class AppComponent implements OnInit {
    taskLists: any;
    tasks: any;
    title: any;
    newTaskText: string;
    currentTaskList: any;

    constructor(private taskListService: TaskListService) {
    }

    ngOnInit() {
        this.getTasksLists();
        setTimeout(function () {
            this.changeTab(this.taskLists[0]);
        }, 3000)

    }

    public getTasksLists = () => {
        this.taskListService.getTaskLists() .subscribe((data) => {
            this.taskLists = data.json();
        });
    };

    public changeTab = (taskList) => {
        this.taskListService.getTasks(taskList.id) .subscribe((data) => {
            this.currentTaskList = taskList;
            this.tasks = data.json();
            this.title = taskList.name;
        });


    };

    public changeTaskCheckStatus = (task) => {
        task.is_checked = !task.is_checked;
        this.taskListService.updateTask(task) .subscribe(() => {
        });
        this.getTasksLists();
    };

    public createNewTask() {
        if (this.newTaskText) {
            let task = {
                taskText: this.newTaskText,
                is_checked: 0,
                tab_id: this.currentTaskList.id
            };
            this.taskListService.createTask(task, this.currentTaskList.id)
                .subscribe(() => {
                });
            this.getTasksLists();
            this.changeTab(this.currentTaskList);
        }
    }

    public removeTask(task) {
        this.taskListService.removeTask(task.id) .subscribe(() => {
        });
        this.getTasksLists();
        this.changeTab(this.currentTaskList);
    }


}