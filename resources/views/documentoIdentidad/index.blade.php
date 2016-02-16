<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Dropdown</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap Dropdown Demo">
    <meta name="author" content="Jim Lim">
    {!! Html::Style('plugins/sb-admin/bower_components/bootstrap/dist/css/bootstrap.min.css')!!}

    {!! Html::Style('plugins/bootstrap/css/bootstrap-select.css')!!}
    {!! Html::Script('plugins/sb-admin/bower_components/jquery/dist/jquery.min.js') !!}
    {!! Html::Script('plugins/bootstrap/js/bootstrap-select.js')!!}
    
    {!! Html::Script('plugins/sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}

  </head>
  <body>

    <div class='container'>
      <section>

        <div class='page-header'>
          <h1>Bootstrap Select</h1>
        </div>

        <div class='row span6 offset3'>

          <form class='form-horizontal' action=''>
            <fieldset>

              <!-- PREPEND EXAMPLE -->
              <div class='control-group'>
                <label class='control-label'>Prepend</label>
                <div class='controls'>
                  <div class='input-prepend dropdown' data-select='true'>
                    <!-- there must not be a space between the prepend toggle and the input field -->
                    <a class='add-on dropdown-toggle' data-toggle='dropdown' href='#'>
                      <!-- span.dropdown-display will be updated with the text from the selected option -->
                      <span class='dropdown-display'>http://</span>
                      <i class='caret'></i>
                    </a><input type='text' placeholder='jh-lim.com' class='span2' />
                    <!-- this hidden field is used to contain the selected option from the dropdown -->
                    <input type='hidden' value='http://' class='dropdown-field' />
                    <!-- unordered list of options -->
                    <ul class='dropdown-menu'>
                      <li>
                        <a href="#" data-value="http://">http://</a>
                      </li>
                      <li>
                        <a href="#" data-value="https://">https://</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /PREPEND EXAMPLE -->

              <!-- APPEND EXAMPLE -->
              <div class='control-group'>
                <label class='control-label'>Append</label>
                <div class='controls'>
                  <div class='input-append dropdown' data-select='true'>
                    <!-- The hidden field can be anywhere within div.dropdown -->
                    <input type='hidden' value='' class='dropdown-field' />
                    <!-- Unordered list of options -->
                    <ul class='dropdown-menu'>
                      <li>
                        <a href="http://localhost:3000/" data-value="minutes">minutes</a>
                      </li>
                      <li>
                        <a href="http://localhost:3000/" data-value="hours">hours</a>
                      </li>
                      <li>
                        <a href="http://localhost:3000/" data-value="days">days</a>
                      </li>
                    </ul>
                    <!-- Make sure there isn't a space between the input and the toggle -->
                    <input type='number' placeholder='5' class='input-mini'/><a
                      class='add-on dropdown-toggle'
                      data-toggle='dropdown' href='#'>
                      <span class='dropdown-display'>minutes</span>
                      <i class='caret'> </i>
                    </a>
                  </div>
                </div>
              </div>
              <!-- /APPEND EXAMPLE -->

            </fieldset>
          </form>

        </div><!-- /.row -->
      </section>
    </div><!-- /.container -->

  </body>
</html>
