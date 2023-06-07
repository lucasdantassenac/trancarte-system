<section class='popUpSection flexCenter'>
            <div id="addArchitectPopUp" class='popUp addPopUp addArchitectPopUp hidden'>
                <div class='flexBetween'>
                    <h2 class='h2'>Cadastrar arquiteto</h2>
                    <span class='closePopUpBtn'>X</span>
                </div>    
                <form class='formPopUp' id='addArchitectForm' method='post' action='<?php echo $url;?>admin/includes/controller/addArchitect.php'>
                    <input type="hidden" name="MAX_FILE_SIZE" value="50000"  class='c25'/>
                    
                    <div class='inputDiv c100'>
                        <label for='photo'>Foto</label>
                        <input type='file' name='photo' id='photo'>
                    </div>
                    
                    <div class='inputDiv c50'>
                        <label for='user'>Usuário*</label>
                        <input type='text' name='user' id='user' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='name'>Nome completo*</label>
                        <input type='text' name='name' id='name' required>
                    </div>
                    
                    <div class='inputDiv c33'>
                        <label for='cpf'>CPF/CNPJ*</label>
                        <input class='i50 if' type='number' name='cpf' id='cpf' required>
                       
                    </div>

                    <div class="inputDiv c33">
                        <label for='rg'>RG*</label>
                        <input class='i50' type='number' name='rg' id='rg' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='pis'>PIS</label>
                        <input class='i50 if' type='text' name='pis' id='pis'>
                        
                    </div>

                    <div class="inputDiv c50">
                        <label for='birthday'>Data de nascimento*</label>
                        <input class='i50' type='date' name='birthday' id='birthday' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='filiation'>Filiação*</label>
                        <input type='text' name='filiation' id='filiation' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='phone'>Telefone celular e/ou fixo*</label>
                        <input type='text' name='phone' id='phone' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='email'>E-mail*</label>
                        <input type='email' name='email' id='email' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='email-premium'>E-mail casa premium*</label>
                        <input type='email' name='email-premium' id='email-premium' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='adress'>Endereço completo*</label>
                        <input type='text' name='adress' id='adress' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='bank'>Dados bancários*</label>
                        <input type='text' name='bank' id='bank' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='password'>Senha provisória*</label>
                        <input type='password' name='password' id='password' required>
                    </div>
                    <div class="inputDiv c100 btnDiv">
                        <input type='submit' class='btn seeMore c100' value='Cadastrar'>
                    </div>
                </form>
            </div>
            
            <div id="addSellerPopUp" class='popUp addPopUp addSellerBtn hidden'>
                <div class='flexBetween'>
                    <h2 class='h2'>Cadastrar Vendedor</h2>
                    <span class='closePopUpBtn'>X</span>
                </div>    
                <form enctype="multipart/form-data" class='formPopUp' id='addSellerBtn' method='post' action='./includes/controller/addSellerBtn.php'>
                    <input type="hidden" name="MAX_FILE_SIZE" value="50000"  class='c25'/>
                    
                    <div class='inputDiv c100'>
                        <label for='photo'>Foto</label>
                        <input type='file' name='photo' id='photo'>
                    </div>

                    <div class='inputDiv c50'>
                        <label for='user'>Usuário*</label>
                        <input type='text' name='user' id='user' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='name'>Nome completo*</label>
                        <input type='text' name='name' id='name' required>
                    </div>
                    
                    <div class='inputDiv c33'>
                        <label for='cpf'>CPF/CNPJ*</label>
                        <input class='i50 if' type='number' name='cpf' id='cpf' required>
                       
                    </div>

                    <div class="inputDiv c33">
                        <label for='rg'>RG*</label>
                        <input class='i50' type='number' name='rg' id='rg' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='pis'>PIS</label>
                        <input class='i50 if' type='text' name='pis' id='pis'>
                        
                    </div>

                    <div class="inputDiv c50">
                        <label for='birthday'>Data de nascimento*</label>
                        <input class='i50' type='date' name='birthday' id='birthday' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='filiation'>Filiação*</label>
                        <input type='text' name='filiation' id='filiation' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='phone'>Telefone celular e/ou fixo*</label>
                        <input type='text' name='phone' id='phone' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='email'>E-mail*</label>
                        <input type='email' name='email' id='email' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='email-premium'>E-mail casa premium*</label>
                        <input type='email' name='email-premium' id='email-premium' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='adress'>Endereço completo*</label>
                        <input type='text' name='adress' id='adress' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='bank'>Dados bancários*</label>
                        <input type='text' name='bank' id='bank' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='password'>Senha provisória*</label>
                        <input type='password' name='password' id='password' required>
                    </div>
                    <div class="inputDiv c100 btnDiv">
                        <input type='submit' class='btn seeMore c100' value='Cadastrar'>
                    </div>
                </form>
            </div>
            
            <div id="addTaskPopUp" class='popUp addPopUp addTaskBtn hidden'>
                <div class='flexBetween'>
                    <h2 class='h2'>Cadastrar pedido</h2>
                    <span class='closePopUpBtn'>X</span>
                </div>    
                <form enctype="multipart/form-data" class='formPopUp' id='addTaskBtn' method='post' action='./includes/controller/addTaskBtn.php'>
                    <input type="hidden" name="MAX_FILE_SIZE" value="50000"  class='c25'/>
                    
                    <div class='inputDiv c100'>
                        <label for='photo'>Foto</label>
                        <input type='file' name='photo' id='photo'>
                    </div>

                    <div class='inputDiv c50'>
                        <label for='user'>Usuário*</label>
                        <input type='text' name='user' id='user' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='name'>Nome completo*</label>
                        <input type='text' name='name' id='name' required>
                    </div>
                    
                    <div class='inputDiv c33'>
                        <label for='cpf'>CPF/CNPJ*</label>
                        <input class='i50 if' type='number' name='cpf' id='cpf' required>
                       
                    </div>

                    <div class="inputDiv c33">
                        <label for='rg'>RG*</label>
                        <input class='i50' type='number' name='rg' id='rg' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='pis'>PIS</label>
                        <input class='i50 if' type='text' name='pis' id='pis'>
                        
                    </div>

                    <div class="inputDiv c50">
                        <label for='birthday'>Data de nascimento*</label>
                        <input class='i50' type='date' name='birthday' id='birthday' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='filiation'>Filiação*</label>
                        <input type='text' name='filiation' id='filiation' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='phone'>Telefone celular e/ou fixo*</label>
                        <input type='text' name='phone' id='phone' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='email'>E-mail*</label>
                        <input type='email' name='email' id='email' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='email-premium'>E-mail casa premium*</label>
                        <input type='email' name='email-premium' id='email-premium' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='adress'>Endereço completo*</label>
                        <input type='text' name='adress' id='adress' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='bank'>Dados bancários*</label>
                        <input type='text' name='bank' id='bank' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='password'>Senha provisória*</label>
                        <input type='password' name='password' id='password' required>
                    </div>
                    <div class="inputDiv c100 btnDiv">
                        <input type='submit' class='btn seeMore c100' value='Cadastrar'>
                    </div>
                </form>
            </div>
            
            <div id="addDownloadPopUp" class='popUp addPopUp addDownloadBtn hidden'>
                <div class='flexBetween'>
                    <h2 class='h2'>Cadastrar download</h2>
                    <span class='closePopUpBtn'>X</span>
                </div>    
                <form enctype="multipart/form-data" class='formPopUp' id='addDownloadForm' method='post' action='./includes/controller/addDownload.php'>
                    <input type="hidden" name="MAX_FILE_SIZE" value="50000"  class='c25'/>
                    
                    <div class='inputDiv c100'>
                        <label for='photo'>Foto</label>
                        <input type='file' name='photo' id='photo'>
                    </div>

                    <div class='inputDiv c50'>
                        <label for='user'>Usuário*</label>
                        <input type='text' name='user' id='user' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='name'>Nome completo*</label>
                        <input type='text' name='name' id='name' required>
                    </div>
                    
                    <div class='inputDiv c33'>
                        <label for='cpf'>CPF/CNPJ*</label>
                        <input class='i50 if' type='number' name='cpf' id='cpf' required>
                       
                    </div>

                    <div class="inputDiv c33">
                        <label for='rg'>RG*</label>
                        <input class='i50' type='number' name='rg' id='rg' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='pis'>PIS</label>
                        <input class='i50 if' type='text' name='pis' id='pis'>
                        
                    </div>

                    <div class="inputDiv c50">
                        <label for='birthday'>Data de nascimento*</label>
                        <input class='i50' type='date' name='birthday' id='birthday' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='filiation'>Filiação*</label>
                        <input type='text' name='filiation' id='filiation' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='phone'>Telefone celular e/ou fixo*</label>
                        <input type='text' name='phone' id='phone' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='email'>E-mail*</label>
                        <input type='email' name='email' id='email' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='email-premium'>E-mail casa premium*</label>
                        <input type='email' name='email-premium' id='email-premium' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='adress'>Endereço completo*</label>
                        <input type='text' name='adress' id='adress' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='bank'>Dados bancários*</label>
                        <input type='text' name='bank' id='bank' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='password'>Senha provisória*</label>
                        <input type='password' name='password' id='password' required>
                    </div>
                    <div class="inputDiv c100 btnDiv">
                        <input type='submit' class='btn seeMore c100' value='Cadastrar'>
                    </div>
                </form>
            </div>
         
            <div id='popUpOverlay' class="overlay z2 hidden"></div>

        </section>