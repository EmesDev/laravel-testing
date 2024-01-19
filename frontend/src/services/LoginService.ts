import axios from 'axios'
import TokenService from './TokenService'

export default class LoginService {
  constructor(private tokenService: TokenService) {}

  public async login(email: string, password: string) {
    const deviceName = navigator.userAgent
    const response = await axios
      .post('http://localhost:8080/api/login', {
        email,
        password,
        device_name: deviceName
      })
      .then((response) => {
        const token = response.data.token

        this.tokenService.SaveToken(token)
        return response
      })
      .catch((error) => {
        return error.response
      })
  }
}
