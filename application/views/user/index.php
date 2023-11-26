    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User Data</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Data</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- ALert -->
        <?php
        if ($this->session->flashdata('alert')) {
            echo $this->session->flashdata('alert');
            unset($_SESSION['alert']);
        }
        ?>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- User Data start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#FormAdd" title="Add Data"><i class="fas fa-plus"></i>
                                Add
                            </button>
                            <a href="<?php echo site_url('user') ?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>
                        </div>
                        <!-- Modal Add User -->
                        <div class="modal fade text-start" id="FormAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h4 class="modal-title" id="myModalLabel33">Form Add User</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <?php echo form_open("user/create") ?>
                                    <form>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="user_fullname">Name </label>
                                                </div>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <?php echo csrf(); ?>
                                                        <input type="text" placeholder="Full Name" class="form-control" id="user_fullname" name="user_fullname" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="user_email">Email </label>
                                                </div>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Alamat Email" class="form-control" id="user_email" name="user_email" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="user_group">Gender </label>
                                                </div>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <select class="form-control" id="user_group" name="user_gender" required>
                                                            <option value="">- Select Gender -</option>
                                                            <option>Laki-Laki</option>
                                                            <option>Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="user_group">Group </label>
                                                </div>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <select class="form-control" id="user_group" name="group_id" required>
                                                            <option value="">- Select Group -</option>
                                                            <?php
                                                            foreach ($group as $g) {
                                                                echo '<option value="' . $g->group_id . '">' . $g->group_name . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="user_name">Username </label>
                                                </div>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Username" class="form-control" id="user_name" name="user_name" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="user_password">Password </label>
                                                </div>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input type="password" placeholder="Password" class="form-control" id="user_password" name="user_password" required="required">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Save</span>
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>
                                        </div>
                                    </form>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- data tabel -->
                    <div class="row p-4">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Group</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($user) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($user as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $key->user_fullname; ?></td>
                                                    <td><?php echo $key->user_name; ?></td>
                                                    <td><?php echo $key->user_email; ?></td>
                                                    <td><?php echo $key->group_name; ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Lihat data" data-bs-target="#FormDetail<?php echo $key->user_id; ?>"><i class="bi bi-eye"></i> Detail
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Update data" data-bs-target="#FormUpdate<?php echo $key->user_id; ?>"><i class="bi bi-pencil-square"></i> Update
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open("user/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item" title="Delete data"><i class="bi bi-x-lg"></i> Delete</button>
                                                                    <input type="hidden" class="form-control" name="user_id" required="required" value="<?php echo $key->user_id; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail User -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Detail User</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <label>Name </label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <label>: <?php echo $key->user_fullname; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <label>Email </label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <label>: <?php echo $key->user_email; ?></label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <label>Gender </label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <label>: <?php echo $key->user_gender; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <label>Group </label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <label>: <?php echo $key->group_name; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <label>Username </label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <label>: <?php echo $key->user_name; ?></label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="close btn btn-light-secondary" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Update User -->
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Detail User</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open("user/update") ?>
                                                            <form>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="user_fullname">Name </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <?php echo csrf(); ?>
                                                                                <input type="hidden" class="form-control" name="user_id" value="<?php echo $key->user_id; ?>" required>
                                                                                <input type="text" placeholder="Full Name" class="form-control" id="user_fullname" name="user_fullname" value="<?php echo $key->user_fullname; ?>" required="required">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="user_email">Email </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <input type="text" placeholder="Alamat Email" class="form-control" id="user_email" name="user_email" value="<?php echo $key->user_email; ?>" required="required">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="user_group">Gender </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <select class="form-control" id="user_group" name="user_gender" required>
                                                                                    <option value="">- Select Gender -</option>
                                                                                    <option <?php if ($key->user_gender == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                                                                                    <option <?php if ($key->user_gender == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="user_group">Group </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <select class="form-control" name="group_id" id="user_group" required>
                                                                                    <option value="">- Select Group -</option>
                                                                                    <?php
                                                                                    foreach ($group as $g) {
                                                                                        if ($key->group_id == $g->group_id) {
                                                                                            echo '<option value="' . $g->group_id . '" selected>' . $g->group_name . '</option>';
                                                                                        } else {
                                                                                            echo '<option value="' . $g->group_id . '">' . $g->group_name . '</option>';
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="user_name">Username </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <input type="text" placeholder="Username" class="form-control" id="user_name" name="user_name" value="<?php echo $key->user_name; ?>" required="required">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="user_password">Password </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <label></label><small class="text-danger">* Leave blank if you don't want to update the password</small></label>
                                                                                <input type="password" placeholder="Password" class="form-control" id="user_password" name="user_password" value="<?php echo $key->user_password; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Save</span>
                                                                    </button>
                                                                    <button type="reset" class="btn btn-light-secondary">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Reset</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php
                                                $no++;
                                            }
                                        } else {
                                            echo '
                                                <tr class="text-center">
                                                    <td colspan="6">Data Not Found</td>
                                                </tr>
                                                ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                </div>
            </div>

        </section>
        <!-- User Data end -->
    </div>