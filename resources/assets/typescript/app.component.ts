import {Component, OnInit} from '@angular/core';
import {HttpService} from './http.service';
import 'rxjs/add/operator/map'

@Component({
    selector: 'main',
    providers: [HttpService],
    templateUrl: 'main/index.html'
})
export class AppComponent implements OnInit {
    items: any;
    tasks: any;
    title: any;
    newTaskText: string;
    currentTabId: number;

    constructor(private httpService: HttpService) {
    }

    ngOnInit() {
        this.getTasks();
        setTimeout(function () {
            this.tasks = this.items[0].tasks;
            this.title = this.items[0].name;
        }, 3000)

    }

    public getTasks = () => {
        this.httpService.getData() .subscribe((data) => {
            this.items = data.json();
        });
    };

    public changeTask = (item) => {
        this.currentTabId = item.id;
        this.tasks = item.tasks;
        this.title = item.name;
    };

    public changeCheck = (task) => {
        task.is_checked = !task.is_checked;
        this.httpService.setTask(task) .subscribe(() => {
        });
        this.getTasks();
    };

    public createNewTask() {
        if (this.newTaskText) {
            let task = {
                taskText: this.newTaskText,
                is_checked: 0,
                tab_id: this.currentTabId
            };
            this.httpService.setTask(task) .subscribe(() => {
                this.tasks.push(task)
            });
            this.getTasks();

        }
    }

    public removeTask(task) {
        this.httpService.removeTask(task.id) .subscribe(() => {
            this.tasks.splice(this.tasks.indexOf(task),1);
            console.log(this.tasks);
        });
       this.getTasks();
    }

    public createNewTab


}