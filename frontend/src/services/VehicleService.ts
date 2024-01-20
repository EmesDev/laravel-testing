import axios from 'axios'
import TokenService from './TokenService'

export default class vehicleService {
  constructor(private tokenService: TokenService) {}

  //http://localhost:8080/api/vehicles
  public async getVehicles() {
    const response = await axios
      .get(`http://localhost:8080/api/vehicles`, {
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

  // http://localhost:8080/api/vehicles/1
  public async getVehicle(id: string) {
    const response = await axios
      .get(`http://localhost:8080/api/vehicles/${id}`, {
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

  // [POST] http://localhost:8080/api/vehicles
  public async createVehicle(data: any) {
    const response = await axios
      .post(`http://localhost:8080/api/vehicles`, data, {
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

  // [PATCH] http://localhost:8080/api/vehicles/1
  public async updateVehicle(id: string, data: any) {
    const response = await axios
      .patch(`http://localhost:8080/api/vehicles/${id}`, data, {
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
    // [DELETE] http://localhost:8080/api/vehicles/1
  public async deleteVehicle(id: string) {
    const response = await axios
      .delete(`http://localhost:8080/api/vehicles/${id}`, {
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
