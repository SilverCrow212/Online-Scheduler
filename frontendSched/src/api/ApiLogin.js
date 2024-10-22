import axios from 'axios';

export async function Login(login) {
    try {
        const receive = await axios.post('login', login);
    } catch (err) {
        console.error('error', err);
    }
}

export async function CreateAcc(details) {
    try {
        const receive = await axios.post('user/register', details);
        console.log('received');
    } catch (err) {
        console.error('error', err);
    }
}