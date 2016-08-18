//	<< p873_003.c >>		2012/02 Y.Takada
//	Port_B‚ÉÚ‘±‚³‚ê‚Ä‚¢‚éLED‚ğ0‚©‚ç128‚Ü‚Å‡”Ô‚É“X“ª
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	int i;
	set_tris_b(0x00);					
	output_b(0x00);
	
	for(i=0;i<=128;i++)	{				//	{}“à‚Ìˆ—‚ğ129‰ñŒJ‚è•Ô‚·	
		output_b(i);					//	i -> PORT_B	
		delay_ms(100);					//	100ms‘Ò‚Â
						
	}
}