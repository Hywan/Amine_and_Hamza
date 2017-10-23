<!DOCTYPE html>

<html lang="en">
<head>
  <title>Amine and Hamza</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="content-type" content="text/javascript; charset=utf-8" />
  <meta http-equiv="content-type" content="text/css; charset=utf-8" />
  <meta name="viewport" content="initial-scale=1.0" />
  <meta name="theme-color" content="#000" />
  <link rel="icon" type="image/png" href="…" />

  <link type="text/css" href="css/main.css" rel="stylesheet" />
</head>
<body>
  <svg xmlns="http://www.w3.org/2000/svg" style="width:0; height:0; visibility:hidden; position:absolute">
    <symbol id="play" viewBox="0 0 28 28">
      <title>play</title>
      <path d="M6,4L24,14L6,24Z" />
    </symbol>
    <symbol id="youtube" viewBox="0 0 24 24">
      <title>youtube</title>
      <path d="M21.61,2.88A66.47,66.47,0,0,0,12,2.4a69.92,69.92,0,0,0-9.6.46C.53,3.48,0,7.68,0,12s.53,8.52,2.4,9.15a69.92,69.92,0,0,0,9.6.46,69.92,69.92,0,0,0,9.6-.46C23.48,20.52,24,16.32,24,12S23.48,3.5,21.61,2.88ZM9.6,17.4V6.6l7.2,5.4Z" />
    </symbol>
    <symbol id="facebook" viewBox="0 0 24 24">
      <title>facebook</title>
      <path d="M17.69,0V3.87s-2.89-.28-3.61.81c-.4.6-.16,2.34-.2,3.6h3.83c-.32,1.47-.56,2.46-.79,3.73H13.86V24H8.55c0-3.7,0-8,0-12H6.29V8.27H8.52c.11-2.76.16-5.5,1.55-6.89C11.64-.18,13.13,0,17.69,0Z" />
    </symbol>
    <symbol id="soundcloud" viewBox="0 0 24 24">
	<path d="M7 17.939h-1v-8.068c.308-.231.639-.429 1-.566v8.634zm3 0h1v-9.224c-.229.265-.443.548-.621.857l-.379-.184v8.551zm-2 0h1v-8.848c-.508-.079-.623-.05-1-.01v8.858zm-4 0h1v-7.02c-.312.458-.555.971-.692 1.535l-.308-.182v5.667zm-3-5.25c-.606.547-1 1.354-1 2.268 0 .914.394 1.721 1 2.268v-4.536zm18.879-.671c-.204-2.837-2.404-5.079-5.117-5.079-1.022 0-1.964.328-2.762.877v10.123h9.089c1.607 0 2.911-1.393 2.911-3.106 0-2.233-2.168-3.772-4.121-2.815zm-16.879-.027c-.302-.024-.526-.03-1 .122v5.689c.446.143.636.138 1 .138v-5.949z" />
    </symbol>
  </svg>

  <nav>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#about-us">About us</a></li>
      <li><a href="#the-band">The band</a></li>
      <li><a href="#tour-dates">Dates</a></li>
      <li><a href="#videos">Videos</a></li>
      <li><a href="#discography">Discography</a></li>
      <li><a href="#get-plugged-in">Contact</a></li>
    </ul>
  </nav>

  <header id="home">
    <h1>Amine &amp; Hamza</h1>
  </header>

  <section id="about-us" class="about_us">
    <h1>About us</h1>

    <div class="w-2/3 align-left">
      <p>
        Amine and Hamza M'raihi are two Tunisian musician brothers,
        playing respectively the oud and the qanun, the two major
        instruments of the classical Arabic music.
      </p>
      <p>
        Since a very young age, the brothers were raised with
        classical Arab music which allowed them to develop an
        extensive mastery of their instruments. They have since
        evolved into diverse musical traditions including classical
        western music, jazz, flamenco, Indian, Persian music and many
        others. Amine and Hamza are leaders of a new voice into the
        Arabic music scenery; anchored in the classical Arabic
        tradition but opened on the diverse musical styles. They are
        the image of a new generation, proud of their multiple
        identities but open and tolerant toward other cultures.
      </p>
      <p>
        Amine and Hamza have performed in many prestigious scenes all
        over the world, including the Arab World Institude in Paris,
        the BBC, the Medina Theatre in Beirut, and the Cairo Opera
        house. they have recorded and published seven albums featuring
        musicians from all over the world and from different musical
        traditions.
      </p>
      <p>
        Their latest project, The Band Beyond Borders, dives even deeper in
        modern harmonies, hypnotic grooves and profound feeling, and features
        french clarinetist Blaise Ubaldini and swiss-indian violinist Baiju
        Bhatt, as well as polish bassist Lukacz and swedish percussionist
        Fredrik.
      </p>
    </div>
  </section>

  <section id="the-band" class="band">
    <h1>The band</h1>

    <ul>
      <li>Prabhu Edouard</li>
      <li>Valentin Conus</li>
      <li>Fredrik Gille</li>
      <li>Baiju Bhatt</li>
      <br />
      <li>Amine Mraihi</li>
      <li>Hamza Mraihi</li>
    </ul>
  </section>

  <section id="tour-dates" class="tours">
    <h1>Tour dates</h1>

    <table class="dates">
      <thead>
        <tr>
          <th>Dates</th>
          <th>Tours</th>
          <th>Locations</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (json_decode(file_get_contents('database/dates.json')) as $date): ?>
        <tr>
          <td><?php echo $date->date ?></td>
          <td><?php echo $date->description ?></td>
          <td><?php echo $date->location ?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </section>

  <section id="videos" class="videos">
    <h1>Videos</h1>

    <figure>
      <div class="video">
        <iframe src="https://www.youtube-nocookie.com/embed/videoseries?list=PL7CCB1995478ABB10&amp;controls=0?ecver=2" allowfullscreen></iframe>
      </div>
    </figure>
    </div>
  </section>

  <section id="discography" class="discography">
    <div class="albums">
        <?php foreach (json_decode(file_get_contents('database/albums.json')) as $album): ?>
        <div class="album-panel">
          <div class="album">
            <h1 class="album__title"><?php echo $album->title ?></h1>

            <div class="album__details">
              <div class="album__cover">
                <img src="image/album/<?php echo $album->id ?>_frontcover.jpg" role="presentation" />
              </div>

              <ul class="album__tracks">
                <?php foreach ($album->tracks as $track): ?>
                <li class="album__track"><span><svg class="ico" role="button"><use xlink:href="#play" /></svg> <?php echo $track->title ?></span></li>
                <?php endforeach ?>
              </ul>
            </div>

            <ul class="album__stores">
              <?php foreach ($album->resellers as $reseller): ?>
              <li class="album__store"><a href="<?php echo $reseller->url ?>"><img src="image/store_<?php echo $reseller->id ?>.png" role="<?php echo $reseller->name ?>" /></a></li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>

  <section id="get-plugged-in" class="section__small text__center">
    <h1>Get Plugged in</h1>

    <p>Join our mailing list to receive news and updates!</p>
    <form action="http://aminehamza.us16.list-manage.com/subscribe/post?u=f430f92fb8c5e0adcb6c127cc&amp;id=fd7628e8d9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="mv" target="_blank">
      <input type="email" value="" name="EMAIL" placeholder="Email address" required>
      <input type="text" value="" name="FNAME" placeholder="First name">
      <input type="text" value="" name="LNAME" placeholder="Last name">
      <div style="position: absolute; left: -5000px;" aria-hidden="true">
        <input type="text" name="b_f430f92fb8c5e0adcb6c127cc_fd7628e8d9" tabindex="-1" value="" />
      </div>
      <input type="submit" value="Join" name="subscribe"></div>
    </form>
  </section>

  <footer class="text__center">
    <p>For management and booking: <a href="mailo:david@insomniacs.ch">david@insomniacs.ch</a></p>
    <p>For booking in eastern Europe: <a href="mailo:info@jv-promotion.com">info@jv-promotion.com</a></p>
    <p>
      <a href="#" title="Facebook" class="link--image mh">
        <svg class="ico"><use xlink:href="#facebook" /></svg>
      </a>
      <a href="#" title="YouTube" class="link--image mh">
        <svg class="ico"><use xlink:href="#youtube"></svg>
      </a>
      <a href="#" title="Soundcloud" class="link--image mh">
        <svg class="ico"><use xlink:href="#soundcloud"></svg>
      </a>
    </p>
  </footer>
</body>
</html>
