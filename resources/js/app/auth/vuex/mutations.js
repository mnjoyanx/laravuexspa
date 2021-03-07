export const REGISTRATION_FAILURE = (state, payload) => {

    console.log(payload, 'this is payload', state)
    state.errors = payload
}
