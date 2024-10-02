<template>
    <v-card class="px-1 py-1" @click="handleClick" color="indigo lighten-4">
      <v-tooltip left>
        <template v-slot:activator="{ on }">
          <v-sheet v-on="on" color="indigo lighten-4">
            <v-chip class="chip-tooth mb-0 mx-auto d-block px-0 elevation-1 blue--text" label outlined>
              <v-icon small color="blue lighten-1">fal fa-check</v-icon>
              <span>Condition</span>
              <v-icon x-small color="red lighten-3">fal fa-times</v-icon>
            </v-chip>
            <v-chip class="chip-tooth mb-1 mx-auto d-block px-0 elevation-3 pink--text" label outlined>
              Treatment
            </v-chip>
          </v-sheet>
        </template>
        <span>Tooltip text</span>
      </v-tooltip>
  
      <div class="circle" role="button">
        <div class="quarter q_top cwhite">
        </div>
        <div class="quarter q_right cwhite">
        </div>
        <div class="quarter q_bottom cwhite">
        </div>
        <div class="quarter q_left cwhite">
        </div>
        <div class="quarter center cwhite">
        </div>
      </div>
  
      <v-chip class="chip-tooth mt-0 mx-auto d-block px-0 elevation-2" color="gray">
        1
      </v-chip>
    </v-card>
  </template>

<script>
  export default {
    
    props: {
        toothId : Number,
        tooth   : Object, 
    },
 
    data () {
      return {
        // tooltip_hide : this.tooltip == '' ? true : false
        // tooltip_html : null,
        // showTip   : "on",
        // tooltip   : this.tooth.
      }
    },

    mounted () {
      this.tool_show = false
    },

    methods : { 
       

    },

    computed : {

        tooth_type() {//P:Permanent B:Baby Tooth  
            if( this.toothId > 50 ) return 'B'
            else return 'P' 
        },

        tooth_color() {
            return this.tooth_active ? '':'indigo lighten-4'
        },

        tooth_active(){
            const cond = ['MO','MC','UN'].findIndex(el => el == this.tooth.condition)
            const trea = ['X','XO'].findIndex(el => el == this.tooth.treatment)
            return cond>=0? false : (trea>=0?false:true)
        },

        color_top () {
          const val = this.tooth.sides ? this.tooth.sides.top : 0 
          return val == 0 ? 'cwhite' + (!this.tooth_active ? ' cInactive' : '') : (val == 1 ? 'cred' : ( val == 2 ? 'cblue' : ''))
        }, 
        color_right () {
          const val = this.tooth.sides ? this.tooth.sides.right : 0 
          return val == 0 ? 'cwhite' + (!this.tooth_active ? ' cInactive' : '') : (val == 1 ? 'cred' : ( val == 2 ? 'cblue' : ''))
        },
        color_bottom () {
          const val = this.tooth.sides ? this.tooth.sides.bottom : 0 
          return val == 0 ? 'cwhite' + (!this.tooth_active ? ' cInactive' : '') : (val == 1 ? 'cred' : ( val == 2 ? 'cblue' : ''))
        },
        color_left () {
          const val = this.tooth.sides ? this.tooth.sides.left : 0 
          return val == 0 ? 'cwhite' + (!this.tooth_active ? ' cInactive' : '') : (val == 1 ? 'cred' : ( val == 2 ? 'cblue' : ''))
        },
        color_center () {
          const val = this.tooth.sides ? this.tooth.sides.center : 0 
          return val == 0 ? 'cwhite' + (!this.tooth_active ? ' cInactive' : '') : (val == 1 ? 'cred' : ( val == 2 ? 'cblue' : ''))
        },

        tooltip () { 
          const tip = this.$parent.getTooltip(this.tooth)  
          // this.showTip = false//tip.length > 0 ? true : false
          return tip
        }, 

    },


  }
</script>
