<style>
    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
        #background: #fffffff7;
        background: rgba(255, 255, 255, 0.94);
        border-radius: 4px;
        padding: 2rem 4rem;
        border-bottom: 8px solid #bb6a6a;
        box-shadow: 0px 0px 1px #a0a0a0;
    }

    .mypic {
        height: 10rem;
        border-radius: 50%;
        border: 2px solid;
    }

    .title {
        font-size: 4rem;
        line-height: 3rem;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 1rem;
        line-height: 2rem;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        padding: 0 5px;
        display: inline-block;
        transition: .2s;
    }
    .links > a:hover {
        transform: scale(1.4);

        /*transition-delay: 1.5;*/
    }

    .m-b-md {
        margin-bottom: 2rem;
    }
    .round {
        border: 1px solid #626b6e;
        padding: 15px;
        border-radius: 100%;
        font-size: 1.3rem !important;
    }
</style>

<template>
    <Motion 
        :values="$data" 
        tag="div" 
        :spring="{ stiffness: 110, damping: 10 }"
    >
        <div 
            class="content" 
            slot-scope="obj" 
            :style="{ 
                transform: `
                    translateY(${obj.offset}px) 
                    scale(${obj.scale})
                `,
            }"
            
            _touchstart="track"
            _touchmove="move"

            _mousedown="track"
            _mouseup="stop"
            _mouseleave="stop"
            _mousemove="move"
        >
            <img class="mypic"
                 src="https://avatars1.githubusercontent.com/u/6430396?v=4&s=460" />
    
            <h1>Daniel Alamo</h1>
            <div class="title m-b-md">
                software engineer
            </div>
            
            <div class="links">
                <h2>🖥 + ☕️ + 🎶 = ❤️</h2>
                <a href="//linkedin.com/in/dalamo">
                    <i class="round fa fa-linkedin"></i>
                </a>
                <a href="//github.com/danalamo">
                    <i class="round fa fa-github"></i>
                </a>
                <a href="//bitbucket.org/danalamo">
                    <i class="round fa fa-bitbucket"></i>
                </a>
                <br><br>
                
                <a href="//laravel.com">Laravel</a>
                <a href="//laravel-news.com">News</a>
                
                <button @click="getVerse">Load Verse</button>
                
                <pre style="text-align:left;">{{ $data }}</pre>
                
            </div>
        </div>
    </Motion>
</template>

<script>
    export default {
        data() {
            return {
                prev_offset: null,
                combined: null,
                scale: .3,
                offset: 200,
                oPageY: null,
                ePageY: null,
                mouseY: null,
                verse: null,
            }
        },
        
        methods: {
            track(e) {
                const pageY = e instanceof TouchEvent ? e.touches[0].pageY : e.pageY;
                
                this.oPageY = pageY
                console.log('pageY', pageY)
            },
            move(e) {
                const pageY = e instanceof TouchEvent ? e.touches[0].pageY : e.pageY;
                
                if (this.oPageY) {
                    this.prev_offset = this.offset
                    this.ePageY = pageY
                    this.mouseY = (pageY - this.oPageY)
                    this.offset += this.mouseY / 5
                }
            },
            stop() {
                this.diff = null
                this.oPageY = null
            },
            async getVerse() {
                let res = await fetch(`/verse`);
                this.verse = await res.json();
            }
        },
        
        mounted() {
            console.log('Component mounted.')
            this.prev_offset = 0
            this.offset = 0
            this.scale = 1
            
            setInterval(() => {
                this.offset = this.prev_offset > (this.offset - this.prev_offset) ? this.offset-3: this.offset+3
                this.prev_offset = this.offset
            }, 600)

            let count = 1
            let interval = setInterval(() => {
                // alert(`interval count: ${count}`)
                count >= 3 ? clearInterval(interval) : null;
                ++count;
                //this.scale = this.offset = this.prev_offset > (this.offset - this.prev_offset) ? this.offset-1 : this.offset+2
                this.scale = this.scale > 0 ? this.scale-.5 : this.scale+1
                // this.prev_offset = this.offset
            }, 600)
        },
    }
</script>
