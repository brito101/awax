<?php $v->layout("_theme"); ?>
<main class="home">
    <section class="banner">
        <h1 class="hide">Banners</h1>
        <div>
            <div class="banner-content">
                <div>
                    <h2 data-anime="400" class="fadeInDown">Design é sobre<br /><span>Comunicação</span></h2>
                    <h3 data-anime="400" class="fadeInRight">Contato: +55 21 99224-7968</h3>
                    <a href="#sobre" data-go=".about" data-anime="400" class="button fadeInUp" title="Saiba mais">Saiba Mais</a>
                </div>
            </div>
            <div class="banner-content">
                <div>
                    <h2 data-anime="400" class="fadeInDown">Design é sobre<br /><span>Elegância</span></h2>
                    <h3>Contato: +55 21 99224-7968</h3>
                    <a href="#sobre" data-go=".about" class="button" title="Saiba mais">Saiba Mais</a>
                </div>
            </div>
            <div class="banner-content">
                <div>
                    <h2>Design é sobre<br /><span>Identidade</span></h2>
                    <h3>Contato: +55 21 99224-7968</h3>
                    <a href="#sobre" data-go=".about" class="button" title="Saiba mais">Saiba Mais</a>
                </div>
            </div>
        </div>
        <div class="banner-buttons">
            <button class="active"></button>
            <button></button>
            <button></button>
        </div>
    </section>

    <section class="about">
        <div class="fadeInScroll">
            <h2>Sobre nós</h2>
            <h3>Um pouco sobre nossa filosofia...</h3>
            <div>
                <div>
                    <p>Desde o primeiro projeto, a responsabilidade sobre a qualidade do produto e satisfação do cliente já era algo notável por ocasião da entrega. Com o passar dos anos fomos nos aperfeiçoando e especializando no que realmente é a necessidade dos nossos clientes, que é o êxito sobre os resultados esperados, independente de qual ferramenta será necessária para atender o objetivo. Focamos na eficiencia com a máxima qualidade possível dentro de um valor adequado à demanda.</p>
                    <a href="#servicos" data-go=".services" title="Saiba mais">Saiba mais</a>
                </div>
                <div>
                    <img src="<?= theme("/assets/images/foto9.webp"); ?>" alt="Sobre nós" />
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="fadeInScroll">
            <h2>Serviços</h2>
            <h3>Nosso melhor para você!</h3>

            <div>
                <div>
                    <img src="<?= theme("/assets/images/medalha.png"); ?>" alt="Alta qualidade" />
                    <h4>Alta qualidade</h4>
                    <p>Fidelidade ao propósito do produto</p>
                </div>
                <div>
                    <img src="<?= theme("/assets/images/estrela.png"); ?>" alt="Design moderno" />
                    <h4>Design moderno</h4>
                    <p>Beleza e elegância de forma única</p>
                </div>
                <div>
                    <img src="<?= theme("/assets/images/relogio.png"); ?>" alt="Updates regulares" />
                    <h4>Updates regulares</h4>
                    <p>Melhoria constante e refinamento</p>
                </div>
                <div>
                    <img src="<?= theme("/assets/images/balao.png"); ?>" alt="Suporte rápido" />
                    <h4>Suporte rápido</h4>
                    <p>Eficácia e garantia no atendimento</p>
                </div>
            </div>
        </div>
    </section>

    <section class="projects">
        <div class="fadeInScroll">
            <h2>Nossos Projetos</h2>
            <h3>O que nós criamos</h3>
            <div>
                <div class="filter">
                    <ul>
                        <li class="active" data-category="general">Geral</li>
                        <li data-category="photos">Fotos</li>
                        <li data-category="branding">Branding</li>
                        <li data-category="adverts">Anúncios</li>
                        <li data-category="development">Desenvolvimento</li>
                        <li data-category="misc">Diversos</li>
                    </ul>
                </div>
                <div class="galery">
                    <div data-category="misc">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto1.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="photos">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto2.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="branding">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto3.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="adverts">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto4.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="development">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto5.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="misc">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto6.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="adverts">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto1.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="branding">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto2.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="photos">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto3.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="photos">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto4.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="misc">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto5.jpg"); ?>" alt="" />
                    </div>
                    <div data-category="">
                        <div class="info">
                            <h5>ABOUT</h5>
                            <p>Vestibulum porta aliquet risus</p>
                        </div>
                        <img src="<?= theme("/assets/images/media/foto6.jpg"); ?>" alt="" />
                    </div>
                </div>

                <a href="https://www.rodrigobrito.dev.br/portfolio" rel="noreferrer" target="_blanck" title="Mais projetos">Mais projetos</a>
            </div>
        </div>
    </section>

    <section class="team">
        <div class="fadeInScroll">
            <h2>Nosso Time</h2>
            <h3>Nossos colegas de trabalho</h3>
            <div>
                <?php foreach ($team as $key => $member) : ?>
                    <div class="team-worker <?= $key <= 3 ? 'active' : ''; ?>">
                        <?php
                        $photo = $member->photo;
                        $userPhoto = ($photo ? image($photo, 150, 150) : theme("/assets/images/avatar.jpg", CONF_VIEW_THEME));
                        ?>
                        <img src="<?= $userPhoto; ?>" alt="<?= $member->fullName(); ?>" title="<?= $member->fullName(); ?>" width="150" />
                        <h4><?= $member->fullName(); ?></h4>
                        <h5>Master mind</h5>
                        <div>
                            <a target="_blank" rel="noreferrer" href="https://www.facebook.com/" title="no Facebook"><img title="Facebook" alt="Facebook" src="<?= theme("/assets/images/facebook.png"); ?>" /></a>
                            <a target="_blank" rel="noreferrer" href="https://br.linkedin.com/" title="no Linkedin"><img title="Linkedin" alt="Linkedin" src="<?= theme("/assets/images/linkedin.png"); ?>" /></a>
                            <a target="_blank" rel="noreferrer" href="https://br.pinterest.com/" title="no Pinterest"><img title="Pinterest" alt="Pinterest" src="<?= theme("/assets/images/pinterest.png"); ?>" /></a>
                            <a target="_blank" rel="noreferrer" href="https://twitter.com/" title="no Twitter"><img title="Twitter" alt="Twitter" src="<?= theme("/assets/images/twitter.png"); ?>" /></a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <?php $group = count($team); ?>
            <?php if ($group <= 3) : ?>
                <div style='height:0; margin-top:0;'>
                <?php else : ?>
                    <div>
                    <?php endif; ?>
                    <?php if ($group > 3) : ?>
                        <div class="pointer-team active"></div>
                        <?php $i = 3; ?>
                        <?php while ($group > $i) : ?>
                            <div class="pointer-team"></div>
                            <?php $i += 3; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </div>
                </div>
    </section>

    <section class="testimonials">
        <div class="fadeInScroll">
            <h2>Clientes Satisfeitos</h2>
            <h3>Comentários dos nossos clientes</h3>
            <div class="testimonials-items">
                <div class="active">
                    <img alt="" src="<?= theme("/assets/images/media/homem2.png"); ?>" />
                    <h4>John Doe</h4>
                    <p>Head of PR Department</p>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel eros vitae erat condimentum viverra a nec lacus. Maecenas eros lectus, rhoncus vel dictum vel, dignissim eget ligula. Vestibulum id tempus quam, sed pellentesque quam."</p>
                </div>
                <div>
                    <img alt="" src="<?= theme("/assets/images/media/homem2.png"); ?>" />
                    <h4>John Doe</h4>
                    <p>Head of PR Department</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel eros vitae erat condimentum viverra a nec lacus. Maecenas eros lectus, rhoncus vel dictum vel, dignissim eget ligula. Vestibulum id tempus quam, sed pellentesque quam.</p>
                </div>
                <div>
                    <img alt="" src="<?= theme("/assets/images/media/homem2.png"); ?>" />
                    <h4>John Doe</h4>
                    <p>Head of PR Department</p>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel eros vitae erat condimentum viverra a nec lacus. Maecenas eros lectus, rhoncus vel dictum vel, dignissim eget ligula. Vestibulum id tempus quam, sed pellentesque quam."</p>
                </div>
            </div>
            <div class="testimonials-buttons">
                <button class="active"></button>
                <button></button>
                <button></button>
            </div>
        </div>
    </section>

    <section class="companies">
        <h2 class="hide">Confiado por</h2>
        <div class="fadeInScroll">
            <div>
                <h3 class="hide">title</h3>
                <img src="<?= theme("/assets/images/media/empresa1.png"); ?>" alt="" title="" />
            </div>
            <div>
                <h3 class="hide">title</h3>
                <img src="<?= theme("/assets/images/media/empresa2.png"); ?>" alt="" title="" />
            </div>
            <div>
                <h3 class="hide">title</h3>
                <img src="<?= theme("/assets/images/media/empresa3.png"); ?>" alt="" title="" />
            </div>
            <div>
                <h3 class="hide">title</h3>
                <img src="<?= theme("/assets/images/media/empresa4.png"); ?>" alt="" title="" />
            </div>
            <div>
                <h3 class="hide">title</h3>
                <img src="<?= theme("/assets/images/media/empresa5.png"); ?>" alt="" title="" />
            </div>
            <div>
                <h3 class="hide">title</h3>
                <img src="<?= theme("/assets/images/media/empresa6.png"); ?>" alt="" title="" />
            </div>
        </div>
    </section>

    <section class="prices">
        <div class="fadeInScroll">
            <h2>Preços</h2>
            <h3>Nossa tabela de preços</h3>
            <div>
                <div>
                    <h4>Express</h4>
                    <h5>$ 9.99</h5>
                    <span>/ month</span>
                    <ul>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                    </ul>
                    <a href="#contact" title="Escolha" data-go=".contact">Escolha</a>
                </div>
                <div>
                    <h4>Express</h4>
                    <h5>$ 9.99</h5>
                    <span>/ month</span>
                    <ul>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                    </ul>
                    <a href="#contact" title="Escolha" data-go=".contact">Escolha</a>
                </div>
                <div>
                    <h4>Express</h4>
                    <h5>$ 9.99</h5>
                    <span>/ month</span>
                    <ul>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                    </ul>
                    <a href="#contact" title="Escolha" data-go=".contact">Escolha</a>
                </div>
                <div>
                    <h4>Express</h4>
                    <h5>$ 9.99</h5>
                    <span>/ month</span>
                    <ul>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                        <li>Tracking issues</li>
                    </ul>
                    <a href="#contact" title="Escolha" data-go=".contact">Escolha</a>
                </div>
            </div>
        </div>
    </section>

    <section class="premium">
        <div class="fadeInScroll">
            <h2>Premium</h2>
            <h3>Ainda mais recursos disponíveis</h3>
            <div>
                <div>
                    <img src="<?= theme("/assets/images/books.webp"); ?>" alt="" title="" />
                </div>
                <div>
                    <ul>
                        <li>
                            <img src="<?= theme("/assets/images/check.png"); ?>" alt="" title="" />
                            <h4>1º RECURSO</h4>
                            <p>Gerenciamento de tráfego</p>
                            <p>Relatório de acessos</p>
                            <p>Relatório de métricas de conversão</p>
                            <p>Análise de desempenho</p>
                        </li>
                        <li>
                            <img src="<?= theme("/assets/images/check.png"); ?>" alt="" title="" />
                            <h4>2º RECURSO</h4>
                            <p>Análise de concorrência</p>
                            <p>Orientação de negócios</p>
                            <p>Administração contábil</p>
                        </li>
                        <li>
                            <img src="<?= theme("/assets/images/check.png"); ?>" alt="" title="" />
                            <h4>3º RECURSO</h4>
                            <p>Desconto de 20% a cada dois contratos</p>
                            <p>Programa de afiliados</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="default dark">
        <div class="section-title">Some Facts</div>
        <div class="section-desc">About our work</div>
        <div class="section-body">
            <div class="section-facts">
                <div class="section-fact">
                    <h3>1000</h3>
                    <div class="section-fact-line"></div>
                    <h4>Design Projects Released</h4>
                    <p>Donec tincidunt cursus</p>
                </div>
                <div class="section-fact">
                    <h3>900</h3>
                    <div class="section-fact-line"></div>
                    <h4>Photos</h4>
                    <p>Morbi ex felis, tincidunt sed hendrerit</p>
                </div>
                <div class="section-fact">
                    <h3>500</h3>
                    <div class="section-fact-line"></div>
                    <h4>Marketing Ideas</h4>
                    <p>Donec tincidunt cursus</p>
                </div>
                <div class="section-fact">
                    <h3>100</h3>
                    <div class="section-fact-line"></div>
                    <h4>Exhibitions</h4>
                    <p>Morbi ex felis, tincidunt sed</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-share">
        <div class="section-share--legend">
            <img src="assets/images/share.png" />
            Tell About Us:
        </div>
        <div class="section-share--item">
            <div class="section-share--icon twitter">
                <img src="assets/images/twitter.png" />
            </div>
            152
        </div>
        <div class="section-share--item">
            <div class="section-share--icon linkedin">
                <img src="assets/images/linkedin.png" />
            </div>
            152
        </div>
        <div class="section-share--item">
            <div class="section-share--icon facebook">
                <img src="assets/images/facebook.png" />
            </div>
            152
        </div>
        <div class="section-share--item">
            <div class="section-share--icon googleplus">
                <img src="assets/images/googleplus.png" />
            </div>
            152
        </div>
        <div class="section-share--item">
            <div class="section-share--icon pinterest">
                <img src="assets/images/pinterest.png" />
            </div>
            152
        </div>
    </section>

    <section class="default light">
        <div class="section-title">Contact Us</div>
        <div class="section-desc">Our Agency Located in Melbourne, Australia</div>
        <div class="section-body">
            <div class="section-contact">
                <form method="POST">
                    <div class="section-contact--split">
                        <input type="text" name="name" placeholder="NAME" />
                        <input type="text" name="name" placeholder="EMAIL" />
                    </div>
                    <input type="text" name="name" placeholder="SUBJECT" />
                    <textarea name="message" placeholder="MESSAGE"></textarea>
                    <input type="submit" value="Send Message" class="button" />
                </form>
            </div>
        </div>
    </section>

    <section class="section-map">
        <div class="section-map--area">
            <div class="section-map--info">
                <div class="section-map--info-item">
                    <div class="section-map--info-item-img">
                        <img src="assets/images/carta.png" />
                    </div>
                    Endereço completão que irá ter algum tamanho
                </div>
                <div class="section-map--info-item">
                    <div class="section-map--info-item-img">
                        <img src="assets/images/localizacao.png" />
                    </div>
                    Endereço completão que irá ter algum tamanho
                </div>
                <div class="section-map--info-item">
                    <div class="section-map--info-item-img">
                        <img src="assets/images/telefone.png" />
                    </div>
                    Endereço completão que irá ter algum tamanho
                </div>
                <div class="section-map--info-item">
                    <div class="section-map--info-item-img">
                        <img src="assets/images/arroba.png" />
                    </div>
                    Endereço completão que irá ter algum tamanho
                </div>
                <div class="section-map--info-item">
                    <div class="section-map--info-item-img">
                        <img src="assets/images/web.png" />
                    </div>
                    Endereço completão que irá ter algum tamanho
                </div>
            </div>
        </div>
    </section>
</main>

<?php $v->start("scripts"); ?>
<script src="<?= theme("/assets/minify/home.js"); ?>"></script>
<?php $v->stop(); ?>