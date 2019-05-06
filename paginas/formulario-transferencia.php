<?php
require_once '../helpers/FakeDB.php';
require_once '../layout/header.php';
require_once '../layout/nav-izquierda.php';
$banco = FakeDB::$banco;

?>

      <!-- Main -->
        <main class="holygrail-main col-lg-7 col-xxl-9">
            <section class="text-center bg-warning">
                <h2>Main content</h2>
                <p class="lead">FORMULARIO TRANSFERENCIA.</p>
            </section>

            <div class="block">
                <div class="container-fluid">
                    <section class="mb-4">
                        <h1>A Holygrail Layout for Bootstrap 4</h2>
                        <p class="lead">Resolved Philip Walton's Holygrail layout with Bootstrap 4 flexbox to achieve a more flexible layout template that consists of <code>nav</code>, <code>main</code> and <code>aside</code> parts</p>
                    </section>

                    <h5>Benefits</h5>
                    <ul>
                        <li>Content + sidebars are fluid and their widths are defined by Bootstrap 4's grid system.</li>
                        <li>All columns are the same height, regardless of which column is actually the tallest.</li>
                        <li>Footer always sits at the bottom of the page, even when content is sparse.</li>
                        <li>With the use of <code>.no-gutters</code>, content and sidebars are able to manage bleeds more effectively.</li>
                        <li>No uneven breaking of background colors.</li>
                    </ul>
                </div>
            </div>

            <div class="block">
              <div class="container-fluid">
                <h5>References</h5>
                    <ul>
                        <li><a href="https://philipwalton.github.io/solved-by-flexbox/demos/holy-grail/">Philip Walton: Holy Grail Layout Solved By Flexbox</a></li>
                        <li><a href="https://v4-alpha.getbootstrap.com/layout/overview/">Bootstrap 4 Docs: Layout</a></li>
                    </ul>
              </div>
            </div>

        </main>


<?php
FakeDB::guardarEnSesion();
require_once '../layout/nav-derecha.php';
require_once '../layout/footer.php';