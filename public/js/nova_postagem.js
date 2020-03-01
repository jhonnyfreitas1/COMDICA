document.addEventListener('DOMContentLoaded', ()=>{

    const inputNewpdf = document.getElementById('newpdf');//botao do evento de adicionar novo elemento de anexo

    const divAnexos = document.getElementById('anexos_pdf'); //div de render
    
    //array que vai ficar toda string 
    const anexosPdf = [

    ]
    

    inputNewpdf.addEventListener('click', (e)=>{
        e.preventDefault();
        let newInputForm = `<div class="form-group col-md-12 p-0 mb-1" '>
                                <div class="file-field  p-0 mb-1"> 
                                <div class="btn btn-danger mb-1 col-md-11  btn-sm float-left ">
                                    <span class="float-left">Procurar pdf</span>
                                        <input type="file" class=" col-9 col-md-8 id="files"  name='pdf'>
                                    </div>
                                </div>
                                </div>
                            </div>`;
                            
   
            anexosPdf.push(newInputForm);//adiciona nova string no array
                
            renderNewInput(defineNameInput(anexosPdf)); ///realiza o render recebendo um novo array de anexos com names alterados

            addNamePdf(anexosPdf);//adicionar um nome ao pdf
        }); 

    //pega todos os elementos do array de inputs para adicionar names neles
    const defineNameInput = (anexosPdf) => {
        const newAnexos  = anexosPdf.map((item, index) =>{   //faz o map em cada elemento fazendo replace no name especifico 
            return item.replace(`name='pdf'` , `name='pdf${index}'`)
        })   
        //console.log(newAnexos);
       return newAnexos;
    }

    const renderNewInput = (newArrayforElements) =>{
        let div = document.createElement("div"); 
        newArrayforElements.map((item, index) => {
            div.innerHTML = item;
            //console.log(div);
            divAnexos.appendChild(div);
        });
    }




    const addNamePdf = (anexosPdf) =>{  
        let elPdf = document.getElementsByName('pdf'+(anexosPdf.length-1));  
        
        let inputHidden = document.createElement('input');
        console.log(elPdf[0]);

        inputHidden.type = 'hidden';
        inputHidden.name = `name_pdf${anexosPdf.length-1}`;
        inputHidden.id = `name_pdf${anexosPdf.length-1}`;

        divAnexos.appendChild(inputHidden);

        elPdf[0].addEventListener(`change`, () =>{
            document.getElementById(`name_pdf${anexosPdf.length-1}`).value = `${window.prompt('Dê um nome ao seu anexo')}`;
            elPdf[0].style.background = 'springgreen';
            
        });

             
        console.log(inputHidden);
    }


});


