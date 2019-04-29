import { Component } from '@angular/core';
import { Login } from './login';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'login';

  responsedata = null;
  loginModel = new Login('hannah', 'password');

  constructor(private http: HttpClient) { }

  senddata(data) {
    console.log(data);
    this.responsedata = "connect";

    let params = JSON.stringify(data);
    console.log(params);

    this.http.post('http://localhost/CS4640/SelfDefense/login.php', data)
      .subscribe((data) => {
        console.log('Got data from backend', data);
        this.responsedata = 'through php';
        this.responsedata = data;
      }, (error) => {
        console.log('Error', error);
        this.responsedata = error;
      })
  }
}
