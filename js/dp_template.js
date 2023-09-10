(function ($) {
  $(document).ready(function () {
    master.init();
    homepage.init();
    conteudos.init();
    master.imageScale();

    $(window)
      .resize(function () {
        master.janela();
        master.imageScale();
      })
      .resize();
  });

  var master = {
    init: function () {
      "use strict";
      if (
        /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
      ) {
        window.addEventListener(
          "load",
          function () {
            new FastClick(document.body);
          },
          false
        );
      }

      master.janela();
      $(".destaques-homepage li .destaques-inner .img-holder-img").imageScale({
        scale: "best-fill",
        align: "center",
        rescaleOnResize: true,
      });
    },
    imageScale: function () {
      try {
        $(".js-imagescale").imageScale("destroy");
      } catch (e) {
        console.log("Error: ", e);
      }
      $(".js-imagescale").each(function () {
        $(this).imageScale();
      });
    },
    janela: function (largura) {
      if (!largura) {
        largura = $(window).width();
      }
      if (largura < 767) {
        $("html")
          .removeClass("big")
          .removeClass("large")
          .removeClass("normal")
          .removeClass("small")
          .addClass("mobile");
      } else if (largura >= 767 && largura < 1000) {
        $("html")
          .removeClass("big")
          .removeClass("large")
          .removeClass("normal")
          .removeClass("mobile")
          .addClass("small");
      } else if (largura >= 1000 && largura < 1200) {
        $("html")
          .removeClass("big")
          .removeClass("large")
          .removeClass("small")
          .removeClass("mobile")
          .addClass("normal");
      } else if (largura >= 1200 && largura < 1500) {
        $("html")
          .removeClass("normal")
          .removeClass("big")
          .removeClass("small")
          .removeClass("mobile")
          .addClass("large");
      } else {
        $("html")
          .removeClass("normal")
          .removeClass("large")
          .removeClass("small")
          .removeClass("mobile")
          .addClass("big");
      }
    },
  };

  var homepage = {
    init: function () {
      "use strict";

      this.slider();

      $(document).on("click", ".c-hamburger", function () {
        $(this).toggleClass("is-active");
        $(".body .menu_principal").stop().slideToggle(500);
      });

      $("#slider li:first-child").addClass("activo");
      $("#slider li:even").addClass("even");
      $("#slider li:odd").addClass("odd");
      
    },

    slider: function () {
      var pager = "";
      // console.log("CONTADOR: " + $("#slider li").length);
      if ($("#slider li").length > 1) {
        //Activa os Thumbnails para a class - "gal-port"
        if ($(".slider_conteudos #slider li").length > 0) {
          pager = "#gal-thumbs";
        }

        //Inicio Slider Generico
        $("#slider").bxSlider({
          mode: "fade",
          responsive: true,
          randomStart: false,
          pager: true,
          pagerSelector: "#navegacao",
          pagerCustom: pager,
          prevText: "",
          nextText: "",
          nextSelector: ".seta-next",
          prevSelector: ".seta-prev",
          onSlideBefore: function (currentSlide, totalSlides, currentSlideHtmlObject) {
            $(".slider-item").removeClass("activo");
            $(currentSlide).addClass("activo");
          },
          pause: 4000,
          auto: true,
          autoDelay: 4000,
        });
      } else {
        //Esconde o pager se tiver so um item
        $(".galeria").remove();
      }

      //Construcao das Thumbnails para a Galeria Show
      if ($(".gal-port").length > 0) {
        $(".gal-port .slider_conteudos #slider li").each(function () {
          var contador = $(".gal-port .slider_conteudos .bx-wrapper #slider li").length;
          var img = $(this).find(".img_banner");
          if (contador > 1) {
            $("#gal-thumbs").append(
              "<li class='galeria_cont'><a href='' class='galeria_item'><img class='galeria_thumb' src='" +
                $(img).attr("src") +
                "' alt=''/></a></li>"
            );
            $("#gal-thumbs li").each(function (i) {
              $(this).attr("id", i);
              i++;
            });
            $("#gal-thumbs li a").each(function (i) {
              $(this).attr("data-slide-index", i);
              i++;
            });
          }
        });

        var cont = $("#gal-thumbs li").length;
        var alturaInit;
        $(window)
          .resize(function () {
            alturaInit = $(".thumbs-wrapper").height();
          })
          .resize();
        //console.log(alturaInit);

        if (cont > 6) {
          if ($("html").hasClass("mobile")) {
            $(".thumbs-wrapper").css("height", 120);
            $(".galeria .gal-port .slider_conteudos #slider .slider-item .slide-desc").css(
              "bottom",
              -alturaInit
            );
          } else {
            $(".thumbs-wrapper").css("height", alturaInit * 2 - 50);
            $(".galeria .gal-port .slider_conteudos #slider .slider-item .slide-desc").css(
              "bottom",
              -80 - alturaInit
            );
          }
        }
        if (cont == 0) {
          $(".thumbs-wrapper").css("height", 0);
          $(".galeria .gal-port .slider_conteudos #slider .slider-item .slide-desc").css(
            "bottom",
            -15
          );

          $(window)
            .resize(function () {
              largura = $(window).width();
              // console.log("Largura" + largura);
              if (largura <= 320) {
                $(".galeria").css("min-height", 270);
              } else if (largura > 320 && largura < 556) {
                $(".galeria").css("min-height", 430);
              } else if (largura > 556 && largura < 756) {
                $(".galeria").css("min-height", 530);
              } else if (largura > 756) {
                $(".galeria").css("min-height", 590);
              }
            })
            .resize();
        }
      }
    },
  };

  var conteudos = {
    init: function () {
      aux.backtop();
      $(".blog-listagem .inner-noticia .imagem-item a > img").imageScale({
        scale: "best-fit",
        align: "center",
        rescaleOnResize: true,
      });
    },
  };

  var aux = {
    init: function () {
      "use strict";
    },

    menuScroll: function (menuSelector, distancia) {
      if (distancia == "") {
        distancia = 0;
      }

      $("html,body")
        .stop(true, true)
        .animate(
          {
            scrollTop: $(menuSelector).offset().top + distancia,
          },
          500,
          function () {
            //  console.log("ofsetop:" + $(menuSelector).offset().top + "id:" + menuSelector);
          }
        );
    },
    QueryString: (function (a) {
      if (a == "") return {};
      var b = {};
      for (var i = 0; i < a.length; ++i) {
        var p = a[i].split("=");
        if (p.length != 2) continue;
        b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
      }
      return b;
    })(window.location.search.substr(1).split("&")),

    radiosbtn: function () {
      // Turn radios into btn-group
      $(".radio.btn-group label").addClass("btn");
      $(".btn-group label:not(.active)").click(function () {
        var label = $(this);
        var input = $("#" + label.attr("for"));

        if (!input.prop("checked")) {
          label
            .closest(".btn-group")
            .find("label")
            .removeClass("active btn-success btn-danger btn-primary");
          if (input.val() == "") {
            label.addClass("active btn-primary");
          } else if (input.val() == 0) {
            label.addClass("active btn-danger");
          } else {
            label.addClass("active btn-success");
          }
          input.prop("checked", true);
        }
      });

      $(".btn-group input[checked=checked]").each(function () {
        if ($(this).val() == "") {
          $("label[for=" + $(this).attr("id") + "]").addClass("active btn-primary");
        } else if ($(this).val() == 0) {
          $("label[for=" + $(this).attr("id") + "]").addClass("active btn-danger");
        } else {
          $("label[for=" + $(this).attr("id") + "]").addClass("active btn-success");
        }
      });
    },
    backtop: function () {
      $("#back-top").click(function () {
        $("body,html").animate({ scrollTop: 0 }, 800);
        return false;
      });
    },
  };
})(jQuery);
