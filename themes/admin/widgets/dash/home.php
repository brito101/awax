<?php $v->layout("_admin"); ?>
<?php $v->insert("widgets/dash/sidebar.php"); ?>

<section class="dash_content_app">
    <header class="dash_content_app_header">
        <h2 class="icon-tachometer">Dash</h2>
    </header>

    <div class="dash_content_app_box">
        <section class="app_dash_home_stats">
            <h2 class="hide">Estatísticas da Dashboard</h2>
            <article>
                <h4 class="icon-pencil-square-o">Blog</h4>
                <p><b>Artigos:</b> <?= $blog->posts; ?></p>
                <p><b>Rascunhos:</b> <?= $blog->drafts; ?></p>
                <p><b>Categorias:</b> <?= $blog->categories; ?></p>
            </article>
            <article>
                <h4 class="icon-tag">Portfólio</h4>
                <p><b>Projetos:</b> <?= $portfolio->posts; ?></p>
                <p><b>Rascunhos:</b> <?= $portfolio->drafts; ?></p>
                <p><b>Categorias:</b> <?= $portfolio->categories; ?></p>
            </article>
            <article>
                <h4 class="icon-graduation-cap">Certificados</h4>
                <p><b>Certificados:</b> <?= $certificates->posts; ?></p>
                <p><b>Rascunhos:</b> <?= $certificates->drafts; ?></p>
            </article>
        </section>

        <section class="app_dash_home_trafic ">
            <h3 class="icon-bar-chart">Online agora:
                <span class="app_dash_home_trafic_count"><?= $onlineCount; ?></span>
            </h3>

            <div class="app_dash_home_trafic_list">
                <?php if (!$online) : ?>
                    <div class="message icon-info-circle">
                        Não existem usuários online navegando no site neste momento.
                    </div>
                <?php else : ?>
                    <?php foreach ($online as $onlineNow) : ?>
                        <article>
                            <h4>
                                [<?= date("H:i:s", strtotime($onlineNow->created_at)); ?> -
                                <?= date("H:i:s", strtotime($onlineNow->updated_at)); ?>]
                            </h4>
                            <p><?= $onlineNow->pages; ?> páginas vistas</p>
                            <p class="icon-link"><a target="_blank" href="<?= url("{$onlineNow->url}"); ?>"><?= $onlineNow->url; ?>
                                </a></p>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="chart">
            <h3>Posts mais vistos</h3>
            <div id="blog-chart"></div>
        </section>

        <section class="chart">
            <h3>Projetos mais vistos</h3>
            <div id="projects-chart"></div>
        </section>
    </div>
</section>

<?php $v->start("pos-scripts"); ?>
<script src="<?= theme("/assets/minify/apexcharts.js", CONF_VIEW_ADMIN); ?>"></script>
<script>
    const colors = [
        '#cb22d4', '#d4af37', '#66d4f1', '#61ddbc', '#f76c82',
        '#821c87', '#876d16', '#39aed9', '#36ba9b', '#d94352'
    ];
    //blog-chart
    const blog = {
        series: [{
            data: [<?= $postChartData; ?>]
        }],
        chart: {
            height: 350,
            type: 'bar'
        },
        colors: colors,
        plotOptions: {
            bar: {
                borderRadius: 4,
                columnWidth: '50%',
                distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [<?= $postChartSeries; ?>],
            labels: {
                show: false
            }
        },
        tooltip: {
            custom: function({
                series,
                seriesIndex,
                dataPointIndex,
                w
            }) {
                return (
                    '<div class="arrow_box">' +
                    "<span>" +
                    w.globals.labels[dataPointIndex] +
                    ": " +
                    series[seriesIndex][dataPointIndex] + " visualizações" +
                    "</span>" +
                    "</div>"
                );
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: "horizontal",
                shadeIntensity: 0.25,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 0.85,
                opacityTo: 1,
                stops: [0, 100]
            },
        }
    };
    //projects-chart
    const projects = {
        series: [{
            data: [<?= $portfolioChartData; ?>]
        }],
        chart: {
            height: 350,
            type: 'bar'
        },
        colors: colors,
        plotOptions: {
            bar: {
                borderRadius: 4,
                columnWidth: '50%',
                distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [<?= $portfolioChartSeries; ?>],
            labels: {
                show: false
            }
        },
        tooltip: {
            custom: function({
                series,
                seriesIndex,
                dataPointIndex,
                w
            }) {
                return (
                    '<div class="arrow_box">' +
                    "<span>" +
                    w.globals.labels[dataPointIndex] +
                    ": " +
                    series[seriesIndex][dataPointIndex] + " visualizações" +
                    "</span>" +
                    "</div>"
                );
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: "horizontal",
                shadeIntensity: 0.25,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 0.85,
                opacityTo: 1,
                stops: [0, 100]
            },
        }
    };

    const blogChart = new ApexCharts(document.querySelector("#blog-chart"), blog);
    const projectsChart = new ApexCharts(document.querySelector("#projects-chart"), projects);
    blogChart.render();
    projectsChart.render();

    $(function() {
        setInterval(function() {
            $.post('<?= url("/admin/dash/home"); ?>', {
                refresh: true
            }, function(response) {
                // count
                if (response.count) {
                    $(".app_dash_home_trafic_count").text(response.count);
                } else {
                    $(".app_dash_home_trafic_count").text(0);
                }

                //list
                let list = "";
                if (response.list) {
                    $.each(response.list, function(item, data) {
                        const url = '<?= url(); ?>' + data.url;
                        list += "<article>";
                        list += "<h4>[" + data.dates + "]</h4>";
                        list += "<p>" + data.pages + " páginas vistas</p>";
                        list += "<p class='icon-link'>";
                        list += "<a target='_blank' href='" + url + "'>" + data.url + "</a>";
                        list += "</p>";
                        list += "</article>";
                    });
                } else {
                    list = "<div class=\"message icon-info-circle\">\n" +
                        "Não existem usuários online navegando no site neste momento.\n" +
                        "</div>";
                }

                $(".app_dash_home_trafic_list").html(list);
            }, "json");
        }, 1000 * 10);
    });
</script>
<?php $v->end(); ?>