import axios from 'axios'
import TokenService from './TokenService'
import { env } from 'env'

export default class recordsService {
  constructor(private tokenService: TokenService) {}

  //http://localhost:8080/api/records
  public async getRecords() {
    const response = await axios
      .get(`${env.url}/api/records`, {
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

  // http://localhost:8080/api/records/1
  public async getRecord(id: string) {
    const response = await axios
      .get(`${env.url}/api/records/${id}`, {
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

  // [POST] http://localhost:8080/api/records
  public async createRecord(data: any) {
    const response = await axios
      .post(`${env.url}/api/records`, data, {
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

  // [PATCH] http://localhost:8080/api/records/1
  public async updateRecord(id: string, data: any) {
    const response = await axios
      .patch(`${env.url}/api/records/${id}`, data, {
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
    // [DELETE] http://localhost:8080/api/records/1
  public async deleteRecord(id: string) {
    const response = await axios
      .delete(`${env.url}/api/records/${id}`, {
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
