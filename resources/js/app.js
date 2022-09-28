import './bootstrap';


import Alpine from 'alpinejs';
import Sortable from 'sortablejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;
window.Sortable = Sortable;
window.Swal = Swal;

Alpine.start();

import toast from 'toast-me';
window.toast = toast;

Livewire.on('QualifyModified', () =>{
    toast('Calificación modificada');
})

Livewire.on('QualifyAdded', (news) =>{
    toast('Calificación de '+news.title+' agregada existosamente');
})

Livewire.on('QualifyRemoved', () =>{
    toast('Calificación eliminada', 'error');
})
