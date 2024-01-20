import axios from 'axios'
import TokenService from './TokenService'

export default class PaginationService {
  constructor(private tokenService: TokenService) {}

//   http://localhost:8080/api/owners?page=2
    public async paginate(page: number, path: string) {
        const response = await axios
        .get(`${path}?page=${page}`, {
            headers: {
            Authorization: await this.tokenService.getAuthorizationHeader()
            }
        })
        .then((response) => {
            return response
        })
        .catch((error) => {
            return error.response
        })
    
        return response
    }
    
}