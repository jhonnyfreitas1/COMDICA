   <form method="post" action="" class="form-signin" enctype="multipart/form-data">
            
                            <div class="form-label-group">
                                <label for="nome" class="text-center">Nome Completo * </label>
                                <input id="nome" class="form-control " type="text" name="user_name" placeholder="a" required>
                        
                            </div>
                            <div class="row">
                                <div class="form-label-group col-md-6">
                                    <label for="inputMatricula" class="text-center">Função</label>
                                    <input id="inputMatricula" class="form-control" type="text" name="user_siap_matricula" placeholder="a" value="" maxlength="14" required>
                                  
                                </div>
                            </div>
                            <div class="form-label-group">
                                <label for="email" class="text-center">E-mail *</label>
                                <input id="email" class="form-control" type="email" name="user_email" placeholder="a" value="" required>
                              
                            </div>
                            <div class="row">
                                <div class="form-label-group col-md-6 ">
                                    <label class="text-center" for="senha"> Senha *</label>
                                    <input id="senha" class="form-control" type="password" name="password" required placeholder="a" maxlength="16" minlength="8">
                                    
                                </div>

                                <div class="form-label-group col-md-6">
                                    <label class="text-center" for="senha2"> Repita a Senha *</label> 
                                    <input id="senha2" placeholder="a" class="form-control" type="password" name="password2" maxlength="16" minlength="8" required>

                            <button class="btn btn-success col-md-12  text-uppercase" id="mudar" type="submit">
                                Cadastrar
                            </button>
                        </form