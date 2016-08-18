//	<< p873_004.c >>		2012/02 Y.Takada
//	Port_B‚ÉÚ‘±‚³‚ê‚Ä‚¢‚éLED‚ğ°128‚©‚ç127‚Ü‚Å‡”Ô‚É“_“”
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	signed int i;
	set_tris_b(0x00);				
	output_b(0x00);
	
	for(i=-128;i<=128;i++)	{					
		output_b(i);						
		delay_ms(50);					//	50ms‘Ò‚Â
						
	}
}