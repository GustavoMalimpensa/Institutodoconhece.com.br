<?php include_once 'header.php'; ?>

  <section>
    <div class="container">
        
      <div class="row">
        <div class="col-xs-12 col-md-12 form-group">
          <?php echo mostraMensagem(); ?>
        </div>
      </div>
      
      <div class="row">
        <div class="col-xs-12 col-md-6 form-group">
          
          <h2>SAA - Serviço de Atendimento ao Aluno</h2>
          <form action="admin/engine/form.php" method="POST">
              <input type="hidden" name="id" value="areaaluno">
              <div class="form-group">
                <input type="text" name="nome" placeholder="Nome do Aluno" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="text" name="curso" placeholder="Curso" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" placeholder="E-mail" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="text" name="telefone" placeholder="Telefone" class="form-control" required>
              </div>
              <div class="form-group">
                <textarea name="mensagem" placeholder="Duvidas e Informações" class="form-control" required></textarea>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-success">Enviar</button>
              </div>
          </form>

        </div>
        <div class="col-xs-12 col-md-6 form-group">
          
          <img src="images/areaaluno2.jpeg">

        </div>

      </div>

    </div>
  </section>

<?php include_once 'footer.php'; ?>