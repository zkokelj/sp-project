casper.test.begin('CasperJS testing', 4, function suite(test) {
    casper.start("http://tranquil-beach-27878.herokuapp.com/", function() {
        test.assertTitle("Avtoporaba.com", "Title is the one expected");
        test.assertExists('form[class="searchForm"]', "searchConsumption form is found");
    });


    var url = 'http://tranquil-beach-27878.herokuapp.com/login';

    casper.start(url, function() {
       console.log("page loaded");
       this.test.assertExists('form[class=form-horizontal]', 'form is found');
       this.fill('form[class=form-horizontal]', {
            email: 'ziga.kokelj@gmail.com',
            password:  'slovenija'
        }, true);
    });

    casper.then(function(){
      if(!casper.exists('form[class=form-horizontal]')){
        this.echo("Uspešna prijava");
      }else{
        this.echo("Neuspešna prijava");
      }
      test.assertTitle("Avtoporaba.com", "Title is the one expected");
      test.assertExists('h2[id=userProfile]',"Successfuly logged in");
    });

    casper.run(function() {
        test.done();
    });
});
