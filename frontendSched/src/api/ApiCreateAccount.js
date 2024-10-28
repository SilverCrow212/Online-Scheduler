import axios from 'axios';
// import { useRouter } from 'vue-router';

export async function CreateAccount(request) {
    try {
        const receive = await axios.post('createacc', request);
    } catch (err) {
        console.error('error', err);
    }
}

export async function EditAccount(request) {
    try {
        const receive = await axios.put('user_details_update', request);
    } catch (err) {
        console.error('error', err);
    }
}