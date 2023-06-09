<section class='popUpSection flexCenter'>
            <div id="addArchitectPopUp" class='popUp addPopUp addArchitectPopUp hidden'>
                <div class='flexBetween'>
                    <h2 class='h2'>Cadastrar arquiteto</h2>
                    <span class='closePopUpBtn'>X</span>
                </div>    
                <form enctype="multipart/form-data" class='formPopUp' id='addArchitectForm' method='post' action='<?php echo $url;?>admin/includes/controller/addArchitect.php'>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"  class='c25'/>
                    
                    <div class='inputDiv c100'>
                        <label for='photo'>Foto</label>
                        <input type='file' accept='image/png, image/jpeg, image/jpg' name='photo' id='photo'>
                    </div>
                    
                    <div class='inputDiv c50'>
                        <label for='user'>Usuário*</label>
                        <input type='text' name='user' id='architectUser' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='name'>Nome completo*</label>
                        <input type='text' name='name' id='architectUame' required>
                    </div>
                    
                    <div class='inputDiv c33'>
                        <label for='cpf'>CPF/CNPJ*</label>
                        <input class='i50 if' type='number' name='cpf' id='architectCpf' required>
                       
                    </div>

                    <div class="inputDiv c33">
                        <label for='rg'>RG*</label>
                        <input class='i50' type='number' name='rg' id='architectRg' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='pis'>PIS</label>
                        <input class='i50 if' type='text' name='pis' id='architectPis'>
                        
                    </div>

                    <div class="inputDiv c50">
                        <label for='birthday'>Data de nascimento*</label>
                        <input class='i50' type='date' name='birthday' id='architectBirthday' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='filiation'>Filiação*</label>
                        <input type='text' name='filiation' id='architectFiliation' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='phone'>Telefone celular e/ou fixo*</label>
                        <input type='text' name='phone' id='architectphone' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='email'>E-mail*</label>
                        <input type='email' name='email' id='architectEmail' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='email-premium'>E-mail casa premium*</label>
                        <input type='email' name='email-premium' id='architectEmailPremium' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='adress'>Endereço completo*</label>
                        <input type='text' name='address' id='architectAdress' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='bank'>Dados bancários*</label>
                        <input type='text' name='bank' id='architectBank' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='password'>Senha provisória*</label>
                        <input type='password' name='password' id='architectPassword' required>
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
                <form class='formPopUp' id='addSellerBtn' method='post' action='./includes/controller/addSellerBtn.php'>

                    <div class='inputDiv c50'>
                        <label for='user'>Usuário*</label>
                        <input type='text' name='user' id='sellerUser' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='name'>Nome completo*</label>
                        <input type='text' name='name' id='sellerName' required>
                    </div>
                    
                    <div class='inputDiv c33'>
                        <label for='cpf'>CPF/CNPJ*</label>
                        <input class='i50 if' type='number' name='cpf' id='sellerCpf' required>
                       
                    </div>

                    <div class="inputDiv c33">
                        <label for='rg'>Telefone*</label>
                        <input class='i50' type='number' name='rg' id='sellerRg' required>
                    </div>


                    <div class="inputDiv c33">
                        <label for='email'>E-mail*</label>
                        <input type='email' name='email' id='sellerEmail' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='password'>Senha provisória*</label>
                        <input type='password' name='password' id='sellerPassword' required>
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
                <form class='formPopUp' id='addTaskBtn' method='post' action='./includes/controller/addTaskBtn.php'>
                    
                    <div class='inputDiv c50'>
                        <label for='user'>Pedido`*</label>
                        <input type='text' name='order' id='order' required>
                    </div>

                    <div class="inputDiv c50">
                        <label for='name'>Cliente*</label>
                        <input type='text' name='client' id='orderClient' required>
                    </div>
                    
                    <div class='inputDiv c33'>
                        <label for='cpf'>Data*</label>
                        <input class='i50 if' type='date' name='date' id='orderDate' required>
                       
                    </div>

                    <div class="inputDiv c33">
                        <label for='rg'>Valor*</label>
                        <input class='i50' type='number' name='value' id='orderValue' required>
                    </div>

                    <div class="inputDiv c33">
                        <label for='pis'>Vendedor</label>
                        <select class='i50 if' name='seller' id='seller'>
                            <?php while ($SellersNames = mysqli_fetch_array($selectAllSellers, MYSQLI_ASSOC)){  ?>
                                <option value="<?php echo $SellersNames['vendedor'];?>"> 
                                    <?php echo $SellersNames['vendedor'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="inputDiv c50">
                        <label for='birthday'>Arquiteto*</label>
                        <select class='i50' name='orderArchitect' id='orderArchitect' required>
                            <?php while ($architectNames = mysqli_fetch_array($selectAllarchitects, MYSQLI_ASSOC)){  ?>
                                <option value="<?php echo $architectNames['email'];?>"> 
                                    <?php echo $architectNames['arquiteto'] ?>
                                </option>
                            <?php } ?>
                        </select>
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
                    
                    <div class="inputDiv c100">
                        <label for='architeName'>Nome</label>
                        <input type='text' name='architeName' id='archiveName' required>
                    </div>

                    <div class='inputDiv c100'>
                        <label for='photo'>Arquivo</label>
                        <input type='file' name='file' id='file' accept='application/pdf'>
                    </div>

                    <div class="inputDiv c100 btnDiv">
                        <input type='submit' class='btn seeMore c100' value='Enviar'>
                    </div>
                </form>
            </div>
         
            <div id='popUpOverlay' class="overlay z2 hidden"></div>

        </section>