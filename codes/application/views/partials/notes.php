<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php   foreach($notes as $note):               ?>
            <div  class="card text-dark border-warning m-3" style="max-width: 15rem; ">
                <div class="col">
                    <div class="card-header col"></div>
                        <div class="card-body">
                            <form action="notes/update/<?= $note['id'] ?>" method="post" class="update">
                                <input type="text" class="card-title border-0 lead" name="title" value="<?= $note['title'] ?>">
                                <textarea name="description" class="card-text w-100 border-0"><?= $note['description'] ?></textarea>
                            </form>
                        </div>
                        <div class="card-footer bg-transparent border-success text-end">
                            <form action="notes/delete/<?= $note['id']; ?>" method="post" class="delete">
                                <input type="submit" value="Delete" class="btn btn-outline-danger btn-sm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php   endforeach;                              ?>        