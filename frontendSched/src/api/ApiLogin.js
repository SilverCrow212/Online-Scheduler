import axios from 'axios';
import { useRouter } from 'vue-router';

export async function Login(login) {
    // console.log('insideapi',login)
    const router = useRouter();
    try {
        const receive = await axios.post('login', login);
        console.log(receive, 'logged in');
        router.push({ name: 'dashboard' });
    } catch (err) {
        console.error('error', err);
    }
}