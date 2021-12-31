<?php
include '../menu/menu.php';
?>

<head>
    <link rel="stylesheet" href="../components/style_menu.css">

</head>
<div class="main-content">

    <header>
        <div class="search-wrapper title">
            <h2 style="font-size: 24px;">Página inicial</h2>
        </div>

        <div class="social-icons">
            <span class="ti-bell"></span>
            <span class="ti-comment"></span>
            <div></div>
        </div>
    </header>

    <main>

        <h2 class="dash-title">Painel</h2>

        <div class="dash-cards">
            <div class="card-single">
                <div class="card-body">
                    <i id="panel" class="fas fa-user-graduate"></i>
                    <div>
                        <h5>Alunos</h5>
                        <h4>241</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="">Visualizar</a>
                </div>
            </div>

            <div class="card-single">
                <div class="card-body">
                    <i id="panel" class="fas fa-list"></i>
                    <div>
                        <h5>Salas</h5>
                        <h4>7</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="">Visualizar</a>
                </div>
            </div>

            <div class="card-single">
                <div class="card-body">
                    <i id="panel" class="fas fa-map"></i>
                    <div>
                        <h5>Mapeamentos</h5>
                        <h4>45</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="">Visualizar</a>
                </div>
            </div>
        </div>


        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Atividade recente</h3>

                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Team</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>App Development</td>
                                    <td>15 Aug, 2020</td>
                                    <td>22 Aug, 2020</td>
                                    <td class="td-team">
                                        <div class="img-1"></div>
                                        <div class="img-2"></div>
                                        <div class="img-3"></div>
                                    </td>
                                    <td>
                                        <span class="badge success">Success</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Logo Design</td>
                                    <td>15 Aug, 2020</td>
                                    <td>22 Aug, 2020</td>
                                    <td class="td-team">
                                        <div class="img-1"></div>
                                        <div class="img-2"></div>
                                        <div class="img-3"></div>
                                    </td>
                                    <td>
                                        <span class="badge warning">Processing</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Server setup</td>
                                    <td>15 Aug, 2020</td>
                                    <td>22 Aug, 2020</td>
                                    <td class="td-team">
                                        <div class="img-1"></div>
                                        <div class="img-2"></div>
                                        <div class="img-3"></div>
                                    </td>
                                    <td>
                                        <span class="badge success">Success</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Front-end Design</td>
                                    <td>15 Aug, 2020</td>
                                    <td>22 Aug, 2020</td>
                                    <td class="td-team">
                                        <div class="img-1"></div>
                                        <div class="img-2"></div>
                                        <div class="img-3"></div>
                                    </td>
                                    <td>
                                        <span class="badge warning">Processing</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Web Development</td>
                                    <td>15 Aug, 2020</td>
                                    <td>22 Aug, 2020</td>
                                    <td class="td-team">
                                        <div class="img-1"></div>
                                        <div class="img-2"></div>
                                        <div class="img-3"></div>
                                    </td>
                                    <td>
                                        <span class="badge success">Success</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="summary">
                    <div class="summary-card">
                        <div class="summary-single">
                            <span class="ti-id-badge"></span>
                            <div>
                                <h5>196</h5>
                                <small>Number of staff</small>
                            </div>
                        </div>
                        <div class="summary-single">
                            <span class="ti-calendar"></span>
                            <div>
                                <h5>16</h5>
                                <small>Number of leave</small>
                            </div>
                        </div>
                        <div class="summary-single">
                            <span class="ti-face-smile"></span>
                            <div>
                                <h5>12</h5>
                                <small>Profile update request</small>
                            </div>
                        </div>
                    </div>

                    <div class="bday-card">
                        <div class="bday-flex">
                            <div class="bday-img"></div>
                            <div class="bday-info">
                                <h5>Dwayne F. Sanders</h5>
                                <small>Birthday Today</small>
                            </div>
                        </div>

                        <div class="text-center">
                            <button>
                                <span class="ti-gift"></span>
                                Wish him
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

</div>

</body>

</html>