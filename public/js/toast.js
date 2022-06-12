/**
 * UI Toasts
 */

 'use strict';

 let selectedType, selectedPlacement, toastPlacement;
 
 let toastOpen = async (toast) => {
   const toastPlacementExample = document.querySelector('.toast-placement-ex'),
     toastPlacementBtn = document.querySelector('#showToastPlacement');
 
   // Dispose toast when open another
   function toastDispose(toast) {
     if (toast && toast._element !== null) {
       if (toastPlacementExample) {
         toastPlacementExample.classList.remove(selectedType);
         DOMTokenList.prototype.remove.apply(toastPlacementExample.classList, selectedPlacement);
       }
       toast.dispose();
     }
   }
 
   if (toastPlacement) {
     toastDispose(toastPlacement);
   } 
 
   selectedType = 'bg-'+ toast.type;
   selectedPlacement = 'top-0 end-0'.split(' ');
 
   document.getElementById("toast-title").innerHTML = toast.title;
   document.getElementById("toast-body").innerHTML = toast.message;
 
   toastPlacementExample.classList.add(selectedType);
   toastPlacementExample.classList.add('show');
   
   DOMTokenList.prototype.add.apply(toastPlacementExample.classList, selectedPlacement);
   toastPlacement = new bootstrap.Toast(toastPlacementExample);
   toastPlacement.show();
 }
 