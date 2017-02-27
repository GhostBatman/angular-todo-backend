import {Injectable} from '@angular/core';
import {Http} from '@angular/http';
import {Headers} from '@angular/http';
@Injectable()
export class TaskListService {

    constructor(private http: Http) {
    }

    getTaskLists() {
        return this.http.get('/api/v1/task-lists')
    }

    getTasks(id) {
        return this.http.get('/api/v1/task-lists/' + id + '/tasks');
    }

    updateTask(task) {
        let headers = new Headers({'Content-Type': 'application/json;charset=utf-8'});
        return this.http.put('/api/v1/tasks/' + task.id, JSON.stringify(task), {headers: headers})
    }

    createTask(task, taskListId) {
        let headers = new Headers({'Content-Type': 'application/json;charset=utf-8'});
        return this.http.post('/api/v1/task-lists/' + taskListId + '/tasks', JSON.stringify(task), {headers: headers})
    }

    removeTask(id) {
        return this.http.delete('/api/v1/tasks/' + id);
    }
}