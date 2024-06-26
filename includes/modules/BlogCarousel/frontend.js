jQuery(function (e) {
    e(".dsm_blog_carousel").each(function (o, t) {
        let l = e(this),
            s = l.find(".dsm-blog-carousel").data(),
            n = "." + l.attr("class").split(" ").join(".") + " .swiper-container",
            a = { nextEl: ".dsm-arrow-button-next" + s.ordernumber, prevEl: ".dsm-arrow-button-prev" + s.ordernumber },
            i = { el: ".dsm-pagination" + s.ordernumber, clickable: !0, type: "progressbar" !== s.pagiButtonStyle ? "bullets" : "progressbar", dynamicBullets: "dynamic" === s.pagiButtonStyle },
            r = s.orientation,
            f = 1 === s.loop,
            c = "on" === s.centered,
            u = "on" !== s.touchMove,
            p = "on" === s.grab,
            d = new Swiper(n, {
                effect: s.effect,
                direction: r,
                autoHeight: "on" !== s.multiRow,
                coverflowEffect: { slideShadows: "on" === s.effectShadows, rotate: s.effectCoverflowRotate, depth: s.effectCoverflowDepth },
                flipEffect: { rotate: 30, slideShadows: "on" === s.effectShadows },
                cubeEffect: { slideShadows: "on" === s.effectShadows, shadow: "on" === s.effectShadows, shadowOffset: 20, shadowScale: 0.94 },
                speed: Number(s.speed),
                loop: !0 === c || ("on" !== s.multiRow && f),
                autoplay: { enabled: !1, delay: s.autoplayspeed, disableOnInteraction: !1 },
                mousewheel: "on" === s.mousewheel,
                setWrapperSize: "cube" !== s.effect && "flip" !== s.effect,
                observer: !0,
                observeParents: !0,
                observeSlideChildren: !0,
                slideClass: "dsm-blog-carousel-item",
                wrapperClass: "dsm-blog-carousel-wrapper",
                navigation: a,
                pagination: i,
                centeredSlides: c,
                slidesPerColumn: "on" === s.multiRow ? Number(s.row) : 2,
                slidesPerColumnFill: "row",
                grabCursor: !1 !== u && p,
                allowTouchMove: u,
                a11y: { enabled: !1, slideRole: "group" },
                breakpoints: {
                    320: {
                        slidesPerView: "cube" === s.effect || "flip" === s.effect ? 1 : Number(s.columnsphone),
                        spaceBetween: "cube" === s.effect || "flip" === s.effect ? 0 : Number(s.spacingphone),
                        slidesPerColumn: "on" === s.multiRow ? Number(s.rowsphone) : 1,
                        slidesPerColumnFill: "row",
                    },
                    480: {
                        slidesPerView: "cube" === s.effect || "flip" === s.effect ? 1 : Number(s.columnsphone),
                        spaceBetween: "cube" === s.effect || "flip" === s.effect ? 0 : Number(s.spacingphone),
                        slidesPerColumn: "on" === s.multiRow ? Number(s.rowsphone) : 1,
                        slidesPerColumnFill: "row",
                    },
                    768: {
                        slidesPerView: "cube" === s.effect || "flip" === s.effect ? 1 : Number(s.columnstablet),
                        spaceBetween: "cube" === s.effect || "flip" === s.effect ? 0 : Number(s.spacingtablet),
                        slidesPerColumn: "on" === s.multiRow ? Number(s.rowstablet) : 1,
                        slidesPerColumnFill: "row",
                    },
                    981: {
                        slidesPerView: "cube" === s.effect || "flip" === s.effect ? 1 : Number(s.columnsdesktop),
                        spaceBetween: "cube" === s.effect || "flip" === s.effect ? 0 : Number(s.spacing),
                        slidesPerColumn: "on" === s.multiRow ? Number(s.row) : 1,
                        slidesPerColumnFill: "row",
                    },
                },
            });
        "on" === s.pauseOnHover &&
            (e(this).on("mouseenter", function (e) {
                d.autoplay.stop();
            }),
            e(this).on("mouseleave", function (e) {
                d.autoplay.start();
            })),
            "on" === s.autoplay &&
                (void 0 === d
                    ? DSM_CardSwiper.autoplay.start()
                    : new Waypoint({
                          element: e(this),
                          handler: function (e) {
                              d.autoplay.start(), this.destroy();
                          },
                          offset: s.autoplayViewport,
                      }));
    });
});
