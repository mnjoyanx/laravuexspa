import axios from 'axios'

export const register = ({commit}, payload) => {
    return new Promise((resolve, rej) => {
        return axios.post('/api/register', payload)
        .then(res => {
            console.log(res, 'this is result');
            resolve(res.data)
        })
        .catch(err => {
            commit('REGISTRATION_FAILURE', err.response.data.errors)
        })
    })
}
