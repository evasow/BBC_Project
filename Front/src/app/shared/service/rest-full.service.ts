import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Data } from '../interface/data';

@Injectable({
  providedIn: 'root'
})
export abstract class RestFullService <T> {

  constructor(protected http: HttpClient) { }

  abstract getResourceUrl(): string;

  url: string = this.getResourceUrl();

  all(url: string = this.url): Observable<Data<T>> {
    return this.http.get<Data<T>>(url);
  }
  post(body: {}, url: string = this.url): Observable<Data<T>> {
    return this.http.post<Data<T>>(url, body);
  }
  delete(id: number, url: string = this.url): Observable<Data<T>> {
    return this.http.delete<Data<T>>(url + "/" + id);
  }
  update(body: {}, id: number, url: string = this.url): Observable<Data<T>> {
    return this.http.put<Data<T>>(url + "/" + id, body);
  }
  search(url: string = this.url): Observable<Data<T>> {
    return this.http.get<Data<T>>(url);
  }
}
