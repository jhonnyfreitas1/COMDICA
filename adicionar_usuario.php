         
                        <div class="container mt-4" style=" ">
                    <form method="post" action="controller/action_create_user.php" class="form-signin ">
                                <h3>Cadastre um novo Administrador no site</h3>
                            <div class="form-label-group col-md-12">
                                <label for="nome" class="text-center">Nome Completo<span style="color: red;">*</span> </label>
                                <input id="nome" class="form-control" data-toggle="tooltip" data-placement="left" title="Esse nome não vai ser seu identificador, apenas será para contribuir mas com suas informações" type="text" name="user_name" placeholder="Ex: Maria francisca..." required>
                        
                            </div>
                       
                            <div class="form-label-group col-md-12 ">
                                <label for="email" class="text-center">E-mail<span style="color: red;">*</span></label>
                                <input id="email" class="form-control" data-toggle="tooltip" data-placement="left" title="Utilize um e-mail valído pós você receberá um e-mail para a confirmação do mesmo" type="email" name="user_email" placeholder="Ex: Example@example.com"  required>
                              
                            </div>
                        
                                <div class="form-label-group col-md-12 ">
                                    <label class="text-center" for="senha"> Senha<span style="color: red;">*</span></label>
                                    <input id="senha" class="form-control" type="password" name="password" required placeholder="**********"  minlength="8">  
                                </div>

                                <div class="form-label-group col-md-12">
                                    <label class="text-center" for="senha2"> Repita a Senha<span style="color: red;">*</span></label> 
                                    <input id="senha2" placeholder="**********" class="form-control" type="password" name="password2"  minlength="8" required>
                            <button class="btn btn-success col-md-12 m-2 text-uppercase" id="mudar" type="submit">
                                Cadastrar
                            </button>
                        </form>
                        </div>
                        </center>

                        <style type="text/css">
                            body{
                                background: linear-gradient(135deg, rgb(34, 130, 227) 0%, rgb(9, 226, 51) 100%);
                            }
                        </style>
                        <script type="text/javascript">
                        
                        </script>