"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require("@angular/core");
var task_list_service_1 = require("./task.list.service");
require("rxjs/add/operator/map");
var AppComponent = (function () {
    function AppComponent(taskListService) {
        var _this = this;
        this.taskListService = taskListService;
        this.getTasksLists = function () {
            _this.taskListService.getTaskLists().subscribe(function (data) {
                _this.taskLists = data.json();
            });
        };
        this.changeTab = function (taskList) {
            _this.taskListService.getTasks(taskList.id).subscribe(function (data) {
                _this.currentTaskList = taskList;
                _this.tasks = data.json();
                _this.title = taskList.name;
            });
        };
        this.changeTaskCheckStatus = function (task) {
            task.is_checked = !task.is_checked;
            _this.taskListService.updateTask(task).subscribe(function () {
            });
            _this.getTasksLists();
        };
    }
    AppComponent.prototype.ngOnInit = function () {
        this.getTasksLists();
        setTimeout(function () {
            this.changeTab(this.taskLists[0]);
        }, 3000);
    };
    AppComponent.prototype.createNewTask = function () {
        if (this.newTaskText) {
            var task = {
                taskText: this.newTaskText,
                is_checked: 0,
                tab_id: this.currentTaskList.id
            };
            this.taskListService.createTask(task, this.currentTaskList.id)
                .subscribe(function () {
            });
            this.getTasksLists();
            this.changeTab(this.currentTaskList);
        }
    };
    AppComponent.prototype.removeTask = function (task) {
        this.taskListService.removeTask(task.id).subscribe(function () {
        });
        this.getTasksLists();
        this.changeTab(this.currentTaskList);
    };
    AppComponent.prototype.createNewTaskList = function () {
        this.taskListService.createTaskList(this.newTaskListText)
            .subscribe(function () {
        });
        this.ngOnInit();
    };
    return AppComponent;
}());
AppComponent = __decorate([
    core_1.Component({
        selector: 'main',
        providers: [task_list_service_1.TaskListService],
        templateUrl: 'main/index.html'
    }),
    __metadata("design:paramtypes", [task_list_service_1.TaskListService])
], AppComponent);
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map