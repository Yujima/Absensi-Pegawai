import './bootstrap';
import * as bootstrap from 'bootstrap';
import { createApp } from 'vue';
import AnchorButtonComponent from './components/AnchorButtonComponent.vue';
import InputComponent from './components/InputComponent.vue';
import ButtonComponent from './components/ButtonComponent.vue';
import CountCardComponent from './components/CountCardComponent.vue';

const app = createApp({
    data() {
        return {
            pegawais : JSON.parse(document.getElementById('app').dataset.pegawais || '[]'),
        }
    },
    computed: {
        hadirCount(){
            return this.pegawais.filter(p => p.status_kehadiran === 'Hadir').length;
        },
        absenCount(){
            return this.pegawais.filter(p => p.status_kehadiran === 'Absen').length;
        },
        pulangCount(){
            return this.pegawais.filter(p => p.status_kehadiran === 'Pulang').length;
        },
    },
    methods:{
        formatTime(datetime){
            if (!datetime) return '-';
            return datetime.substring(11, 16); // "YYYY-MM-DD HH:MM:SS" -> "HH:MM"
        },
        confirmDelete(event){
            event.preventDefault(); // stop the native submit immediately, no exceptions
            if (confirm('Yakin ingin hapus data?')) {
                event.target.closest('form').submit();
            }
        },
        async updateKehadiran(pegawai){
            try {
                const response = await axios.patch(`/pegawai/${pegawai.id}/kehadiran`, {
                    status_kehadiran: pegawai.status_kehadiran,
                });
                Object.assign(pegawai, response.data);
            } catch (error) {
                alert('Gagal memperbarui data kehadiran.');
                console.error(error);
            }
        },
        absen(pegawais){
            pegawais.status_kehadiran = 'Absen';
            this.updateKehadiran(pegawais);
        },
        hadir(pegawais){
            pegawais.status_kehadiran = 'Hadir';
            this.updateKehadiran(pegawais);
        },
        pulang(pegawais){
            pegawais.status_kehadiran = 'Pulang';
            this.updateKehadiran(pegawais);
        },
        submitPrevent(event){
            event.preventDefault();
            event.target.closest('form').submit();
        }
    }
});

app.component('a-btn-component', AnchorButtonComponent);
app.component('btn-component', ButtonComponent);
app.component('input-component', InputComponent);
app.component('count-card-component', CountCardComponent);

app.mount('#app');