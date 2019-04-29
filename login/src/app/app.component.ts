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
  loginModel = new Login('', '');
  username = "";

  constructor(private http: HttpClient) { }

  senddata(data) {
    this.username = data.username;
    this.responsedata = "";

    let params = JSON.stringify(data);
    console.log(params);

    this.http.post('http://localhost/CS4640/SelfDefense/login.php', data)
      .subscribe((data) => {
        console.log('Got data from backend', data);
        this.responsedata = JSON.parse(JSON.stringify(data)).data.issue;
        console.log(this.responsedata)
        if(this.responsedata == 'no issues here'){
          console.log("all good")
          window.location.href = 'http://localhost/CS4640/SelfDefense/home.php?user='+this.username;}
      }, (error) => {
        console.log('Error', error);
        this.responsedata = error;
      })
  }
}
