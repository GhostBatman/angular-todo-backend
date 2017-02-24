import {Injectable} from '@angular/core';
import {Http} from '@angular/http';
import {Headers} from '@angular/http';
@Injectable()
export class HttpService {

    constructor(private http: Http) {
    }

    getData() {
        return this.http.get('/getItems')
    }

    editAndCreateTask(task) {
        let headers = new Headers({'Content-Type': 'application/json;charset=utf-8'});
        return this.http.post('/editAndCreateTask', JSON.stringify(task), {headers: headers})
    }

    removeTask(id: number) {
        let headers = new Headers({'Content-Type': 'application/json;charset=utf-8'});
        return this.http.post('/removeTask', {id: id}, {headers: headers})
    }
}