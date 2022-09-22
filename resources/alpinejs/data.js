const data = () => {
    return {
        carousel: [{
            selected: true,
            title: "Lorem ipsum dolor sit, amet consectetur adipisicing elit.",
            subtitle: "Amet, possimus facere! Dicta, vitae similique quam minima, pariatur, cum aut reiciendis accusamus sit explicabo doloremque iste delectus beatae eveniet voluptatibus laborum.",
            background: "../storage/app/public/images/carousels/background/sakura-1.png"
        }, {
            selected: false,
            title: "Lorem ipsum dolor sit, amet consectetur adipisicing elit.",
            subtitle: "Natus accusamus ipsam consectetur possimus nisi. Tempore pariatur repudiandae asperiores dolor nisi eum sed aperiam deserunt. Ipsum ut similique quis quisquam voluptas?",
            background: "../storage/app/public/images/carousels/background/sakura-2.png"
        }, {
            selected: false,
            title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            subtitle: "Hic obcaecati eius id laboriosam nobis saepe consequuntur velit magni. Possimus, dicta autem aut quo numquam animi! Quasi porro odio itaque dicta.",
            background: "../storage/app/public/images/carousels/background/sakura-3.png"
        }, {
            selected: false,
            title: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ipsa earum eum?",
            subtitle: " Voluptatem consequuntur excepturi perferendis error nemo nesciunt vitae commodi autem, earum praesentium quis voluptatibus suscipit velit pariatur corporis.",
            background: "../storage/app/public/images/carousels/background/sakura-4.png"
        }, {
            selected: false,
            title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            subtitle: " Optio deleniti quos, ducimus quod soluta officia dolorum ad repellat, omnis repellendus quis unde atque asperiores quaerat pariatur. Inventore, a? Incidunt, odit!",
            background: "../storage/app/public/images/carousels/background/sakura-5.png"
        }, {
            selected: false,
            title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            subtitle: " Quaerat adipisci voluptatum esse, eligendi eveniet beatae recusandae exercitationem perferendis suscipit nobis unde corporis error quibusdam mollitia architecto totam praesentium? Iure, culpa.",
            background: "../storage/app/public/images/carousels/background/sakura-6.png"
        }, {
            selected: false,
            title: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio inventore voluptatibus voluptate quia voluptas.",
            subtitle: "Harum voluptatem placeat ipsam? Doloribus tenetur aliquid nemo repudiandae ut. Recusandae, numquam! Repudiandae molestias impedit eum.",
            background: "../storage/app/public/images/carousels/background/sakura-7.png"
        }],
        dataCarousel() {
            console.log(this.carousel);
            return this.carousel;
        },
        next: 1,
        previous: 0,
        aux_next: 0,
        aux_previous: 0,
        selected: 0,
        clickNext() {
            if (this.next == 1) {
                this.carousel[this.next].selected = true;
                this.carousel[this.next - 1].selected = false;
                this.aux_next = this.next;
                this.next = this.next + 1;
                this.previous = this.carousel.length - 1;
            } else {
                if (this.next == this.carousel.length) {
                    this.carousel[this.carousel.length - 1].selected = false;
                    this.carousel[0].selected = true;
                    this.aux_next = 0;
                    this.next = 1;
                    this.previous = this.carousel.length - 1;
                } else {
                    this.carousel[this.next].selected = true;
                    this.carousel[this.next - 1].selected = false;
                    this.aux_next = this.next;
                    this.next = this.next + 1;
                    this.previous = this.aux_next - 1;
                }
            }
            return this.aux_next;
        },
        clickPrevious() {
            if (this.next == 1) {
                this.carousel[this.carousel.length - 1].selected = true;
                this.carousel[this.next - 1].selected = false;
                this.aux_previous = this.carousel.length - 1;
                this.previous = this.aux_previous - 1;
                this.next = 0;
            } else {
                this.carousel[this.previous].selected = true;
                this.carousel[this.previous + 1].selected = false;
                this.aux_previous = this.previous;
                this.previous = this.previous - 1;
                this.next = this.aux_previous + 1;
            }
            return this.aux_previous;
        },
    };
};
