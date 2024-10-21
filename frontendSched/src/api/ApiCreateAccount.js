import axios from 'axios';
// import { useRouter } from 'vue-router';

export async function CreateAccount(request) {
    try {
        const receive = await axios.post('createacc', request);
    } catch (err) {
        console.error('error', err);
    }
}