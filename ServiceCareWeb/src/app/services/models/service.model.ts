export interface IService {
    id: number,
    name: string,
    url: string,
    date_created: string,
    last_status_code: number,
    last_status_message: string,
    method: string,
    has_ssl: number,
    success_percentage: string,
    success_requests: string,
    failed_requests: string
}