import axios from 'axios'
import TokenService from './TokenService'

export default class DeleteService {
  constructor(private tokenService: TokenService) {}

  //   http://localhost:8080/api/owners?page=2
  public async paginate(path: string, id: number) {
    const response = await axios
      .delete(`http://localhost:8080/api/${path}/${id}`, {
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
