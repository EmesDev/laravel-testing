import axios from 'axios'
import TokenService from './TokenService'

export default class OwnerService {
  constructor(private tokenService: TokenService) {}

  //http://localhost:8080/api/owners
  public async getOwners() {
    const response = await axios
      .get(`http://localhost:8080/api/owners`, {
        headers: {
          Authorization: await this.HeaderToken()
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

  // http://localhost:8080/api/owners/1
  public async getOwner(id: string) {
    const response = await axios
      .get(`http://localhost:8080/api/owners/${id}`, {
        headers: {
          Authorization: await this.HeaderToken()
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

  // [POST] http://localhost:8080/api/owners
  public async createOwner(data: any) {
    const response = await axios
      .post(`http://localhost:8080/api/owners`, data, {
        headers: {
          Authorization: await this.HeaderToken()
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

  // [PATCH] http://localhost:8080/api/owners/1
  public async updateOwner(id: string, data: any) {
    const response = await axios
      .patch(`http://localhost:8080/api/owners/${id}`, data, {
        headers: {
          Authorization: await this.HeaderToken()
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
    // [DELETE] http://localhost:8080/api/owners/1
  public async deleteOwner(id: string) {
    const response = await axios
      .delete(`http://localhost:8080/api/owners/${id}`, {
        headers: {
          Authorization: await this.HeaderToken()
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


  private async HeaderToken (){
    const token = await this.tokenService.getAuthorizationHeader()
    return token
  }
}
