/*
Author: Tristan Denyer (based on Charlie Griefer's original clone code, and some great help from Dan - see his comments in blog post)
Plugin repo: https://github.com/tristandenyer/Clone-section-of-form-using-jQuery
Demo at http://tristandenyer.com/using-jquery-to-duplicate-a-section-of-a-form-maintaining-accessibility/
Ver: 0.9.4.1
Last updated: Sep 24, 2014
The MIT License (MIT)
Copyright (c) 2011 Tristan Denyer
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
// Função de adicionar campo de formulário - Adiciona novo lance
$(document).ready(function() {
    $(function () {
        $('#btnAdd').click(function () {
            // Verifica quantos clones existe, cria variável de incremento
            // identifica e clona o elemento com novos atributos e ID de
            // incremento
            var num     = $('.lancamento').length, 
                newNum  = new Number(num + 1),      
                newElem = $('#lancamento' + num).clone().attr('id', 'lancamento' + newNum).fadeIn('slow'); 
        
        /*  This is where we manipulate the name/id values of the input inside the new, cloned element
            Below are examples of what forms elements you can clone, but not the only ones.
            There are 2 basic structures below: one for an H2, and one for form elements.
            To make more, you can copy the one for form elements and simply update the classes for its label and input.
            Keep in mind that the .val() method is what clears the element when it gets cloned. Radio and checkboxes need .val([]) instead of .val('').
        */
            // H4 - cabeçalho da quantidade de lances
            newElem.find('.heading-reference').attr('id', 'ID' + newNum + '_reference').attr('name', 'ID' + newNum + '_reference').html('Lançamento #' + newNum);
            
            // Contagem do número de lances
            newElem.find('#count').val(newNum);

            // Lance - número
            newElem.find('.lb_lance').attr('for', 'ID' + newNum + '_lance');
            newElem.find('.lance').attr('id', 'ID' + newNum + '_lance').attr('name', 'L' + newNum + '_lance').val('');

            // Data do lance - data
            newElem.find('.lb_data_lance').attr('for', 'ID' + newNum + '_lb_data_lance');
            newElem.find('.lance_data').attr('id', 'ID' + newNum + '_lance-data').attr('name', 'L' + newNum + '_lance_data').val('');

            // Anzois - numero
            newElem.find('.lb_anzois').attr('for', 'ID' + newNum + '_anzois');
            newElem.find('.anzois').attr('id', 'ID' + newNum + '_anzois').attr('name', 'L' + newNum + '_anzois').val('');

            // Latitude do Lance - numero
            newElem.find('.lb_lance_lat').attr('for', 'ID' + newNum + '_lance_lat');
            newElem.find('.lance_lat').attr('id', 'ID' + newNum + '_lance_lat').attr('name', 'L' + newNum + '_lance_lat').val('');

            // Longitude do Lance - numero
            newElem.find('.lb_lance_long').attr('for', 'ID' + newNum + '_lance_long');
            newElem.find('.lance_long').attr('id', 'ID' + newNum + '_lance_long').attr('name', 'L' + newNum + '_lance_long').val('');

            // Isca - checkbox
            newElem.find('.lb_isca').attr('for', 'ID' + newNum + '_isca');
            newElem.find('.isca_check').attr('id', 'ID' + newNum + '_isca').attr('name',  'L' + newNum + '_isca[]').val([]);

            // Hora inicial do lancamento - hora
            newElem.find('.lb_hora_ini').attr('for', 'ID' + newNum + '_lance_hora_ini');
            newElem.find('.lance_hora_ini').attr('id', 'ID' + newNum + '_lance_hora_ini').attr('name', 'L' + newNum + '_lance_hora_ini').val('');

            // Hora final do lancamento - hora
            newElem.find('.lb_hora_fin').attr('for', 'ID' + newNum + '_lance_hora_fin');
            newElem.find('.lance_hora_fin').attr('id', 'ID' + newNum + '_lance_hora_fin').attr('name', 'L' + newNum + '_lance_hora_fin').val('');

            // Tipo de medida mitigatória - checkbox
            newElem.find('.lb_mm_tipo').attr('for', 'ID' + newNum + '_mm_tipo');
            newElem.find('.mm_check').attr('id', 'ID' + newNum + '_mm_tipo').attr('name', 'L' + newNum + '_mm_tipo[]').val([]);

            // Uso da medida mitigatória - radio
            newElem.find('.lb_mm_uso').attr('for', 'ID' + newNum + '_mm_uso');
            newElem.find('.mm_uso_radio').attr('id', 'ID' + newNum + '_mm_uso').attr('name', 'L' + newNum + '_mm_uso').val([]);

            // Captura de ave - radio
            newElem.find('.lb_ave_capt').attr('for', 'ID' + newNum + '_ave_capt');
            newElem.find('.ave_capt').attr('id', 'ID' + newNum + '_ave_capt').attr('name', 'L' + newNum + '_ave_capt').val([]);

            // Ave capturada - spp - select e texto
            newElem.find('.lb_capt_spp').attr('for', 'ID' + newNum + '_capt_spp');
            newElem.find('.capt_spp').attr('id', 'ID' + newNum + '_capt_spp').attr('name', 'L' + newNum + '_capt_spp[]').val([]);
            // Ave captura - quantidade - texto
            newElem.find('.lb_capt_quant').attr('for', 'ID' + newNum + '_capt_quant');
            newElem.find('.capt_quant').attr('id', 'ID' + newNum + '_capt_quant').attr('name', 'L' + newNum + '_capt_quant[]').val([]);
            
        // Insere o novo elemento logo após o novo item duplicado
            $('#lancamento' + num).after(newElem);
        // Coloca o foco do no elemento

        // Enable the "remove" button. This only shows once you have a duplicated section.
            $('#btnDel').attr('disabled', false);

        // // Right now you can only add 4 sections, for a total of 5. Change '5' below to the max number of sections you want to allow.
        //     if (newNum == 5)
        //     $('#btnAdd').attr('disabled', true).prop('value', "You've reached the limit"); // value here updates the text in the 'add' button when the limit is reached 
        });

        $('#btnDel').click(function () {
        // Confirmation dialog box. Works on all desktop browsers and iPhone.
            if (confirm("Tem certeza que quer excluir o útlimo lançamento"))
                {
                    var num = $('.lancamento').length;
                    // how many "duplicatable" input fields we currently have
                    $('#lancamento' + num).slideUp('slow', function () {$(this).remove();
                    // if only one element remains, disable the "remove" button
                        if (num -1 === 1)
                    $('#btnDel').attr('disabled', true);
                    // enable the "add" button
                    $('#btnAdd').attr('disabled', false).prop('value', "+ Lance");});
                }
            return false; // Removes the last section you added
        });
        // Enable the "add" button
        $('#btnAdd').attr('disabled', false);
        // Disable the "remove" button
        $('#btnDel').attr('disabled', true);
    });    
});


// // Função de adição de ave capturada
// $(function () {
//     $('#btnAddAve').click(function () {
//         var num     = $('.capt_ave').length, // Checks to see how many "duplicatable" input fields we currently have
//             newNum  = new Number(num + 1),  // The numeric ID of the new input field being added, increasing by 1 each time
//             newElem = $('#capt_ave' + num).clone().attr('id', 'capt_ave' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
    
//         // Contagem do número de lances
//         newElem.find('#count_capt').val(newNum);

//         // Lance - numero
//         newElem.find('.lb_capt_lan').attr('for', 'ID' + newNum + '_capt_lan');
//         newElem.find('.capt_lan').attr('id', 'ID' + newNum + '_capt_lan').attr('name', 'C' + newNum + '_capt_lan').val('');

//         // Espécie capturada - select
//         newElem.find('.lb_capt_spp').attr('for', 'ID' + newNum + '_capt_spp');
//         newElem.find('.capt_spp_sel').attr('id', 'ID' + newNum + '_capt_spp').attr('name', 'C' + newNum + '_capt_spp').val('');

//         // Quantidade - número
//         newElem.find('.lb_capt_quant').attr('for', 'ID' + newNum + '_capt_quant');
//         newElem.find('.capt_quant').attr('id', 'ID' + newNum + '_capt_quant').attr('name', 'C' + newNum + '_capt_quant').val('');

//         // Insert the new element after the last "duplicatable" input field
//         $('#capt_ave' + num).after(newElem);
//         // $('#ID' + newNum + '_capt_lanc').focus();

//         // Enable the "remove" button. This only shows once you have a duplicated section.
//         $('#btnDelAve').attr('disabled', false);
//     });

//     $('#btnDelAve').click(function () {
//         var num = $('.capt_ave').length;
//         // how many "duplicatable" input fields we currently have
//         $('#capt_ave' + num).slideUp('slow', function () {$(this).remove();
//         // if only one element remains, disable the "remove" button
//             if (num -1 === 1)
//         $('#btnDelAve').attr('disabled', true);
//         // enable the "add" button
//         $('#btnAddAve').attr('disabled', false).prop('value', "+ Captura");
//         });
//         return false; // Removes the last section you added
//     });
//     // Enable the "add" button
//     $('#btnAddAve').attr('disabled', false);
//     // Disable the "remove" button
//     $('#btnDelAve').attr('disabled', true);
// });