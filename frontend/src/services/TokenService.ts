
export default class TokenService {
  public SaveToken(token: any): string {
    localStorage.setItem('token', token)
    return 'token'
  }

  public getToken() {
    return localStorage.getItem('token')
  }

  public removeToken() {
    localStorage.removeItem('token')
    return console.info('Token removed')
  }

  public hasToken() {
    return !!localStorage.getItem('token')
  }

  public async getAuthorizationHeader() {
    const token = await this.getToken()
    return `Bearer ${token}`
  }
}
