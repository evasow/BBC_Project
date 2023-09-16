import { Link } from "./link";

export interface Data<T> {
    data: T[] ;
    message: string;
    succcess: number;
    links?: Link[];
}
