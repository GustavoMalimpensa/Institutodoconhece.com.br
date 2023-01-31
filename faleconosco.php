<?php include_once 'header.php'; ?>

  <section>
    <div class="container">
        
      <div class="row">
        <div class="col-xs-12 col-md-12 form-group">
          <?php echo mostraMensagem(); ?>
        </div>
      </div>
      
      <div class="row">
        <div class="col-xs-12 col-md-6 boxfaleconosco form-group">
          
          <h1>Fale Conosco</h1>
          <form action="admin/engine/form.php" method="POST">
              <input type="hidden" name="id" value="contatosite">
              <div class="form-group">
                <input type="text" name="nome" placeholder="Nome" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" placeholder="E-mail" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="text" name="celular" placeholder="Celular" class="form-control" required>
              </div>
              <div class="form-group">
                <textarea name="mensagem" placeholder="Mensagem" class="form-control" required></textarea>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-success">Enviar</button>
              </div>
          </form>

        </div>
        <div class="col-xs-12 col-md-6 boxfaleconosco form-group">
          
          <h1>Instituto do Conhecer</h1>
          <h4><i class="fa fa-phone" style="color:green;"></i> (19) 2112-7760</h4>
          <h4><i class="fa fa-whatsapp" style="color:green;"></i> (19) 99446-1403</h4>
          <p>Av. 16, Edíficio Blue Office, 353</p>
          <p>Centro, Rio Claro - SP</p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3688.683207954794!2d-47.56520938504339!3d-22.40329698527021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c7db6524dc3f9f%3A0xc6192e4d401bcbed!2sInstituto+do+Conhecer!5e0!3m2!1spt-BR!2sbr!4v1544535110772" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>

      </div>

    </div>
  </section>

<?php include_once 'footer.php'; ?>