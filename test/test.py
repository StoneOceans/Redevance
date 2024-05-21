import pytest

class Productas:
    def __init__(self, flpl_call_sign=None, flpl_depr_airp=None, flpl_arrv_airp=None,
                 airc_type=None, aobt=None, eobt=None, file_date=None, flight_state=None,
                 flight_type=None, ifps_registration_mark=None, initial_flight_rule=None,
                 nm_ifps_id=None, nm_tactical_id=None):
        self.flpl_call_sign = flpl_call_sign
        self.flpl_depr_airp = flpl_depr_airp
        self.flpl_arrv_airp = flpl_arrv_airp
        self.airc_type = airc_type
        self.aobt = aobt
        self.eobt = eobt
        self.file_date = file_date
        self.flight_state = flight_state
        self.flight_type = flight_type
        self.ifps_registration_mark = ifps_registration_mark
        self.initial_flight_rule = initial_flight_rule
        self.nm_ifps_id = nm_ifps_id
        self.nm_tactical_id = nm_tactical_id

def test_init():
    newvol = Productas(
        flpl_call_sign='ABC123',
        flpl_depr_airp='JFK',
        flpl_arrv_airp='LAX',
        airc_type='Boeing 737',
        aobt=1609459200,  # Example Unix timestamp
        eobt=1609462800,  # Example Unix timestamp
        file_date=20200101,  # Example date in YYYYMMDD format
        flight_state='Scheduled',
        flight_type='Commercial',
        ifps_registration_mark='N12345',
        initial_flight_rule='IFR',
        nm_ifps_id='IFPS123',
        nm_tactical_id='TACT123'
    )

    assert newvol.flpl_call_sign == 'ABC123'
    assert newvol.flpl_depr_airp == 'JFK'
    assert newvol.flpl_arrv_airp == 'LAX'
    assert newvol.airc_type == 'Boeing 737'
    assert newvol.aobt == 1609459200
    assert newvol.eobt == 1609462800
    assert newvol.file_date == 20200101
    assert newvol.flight_state == 'Scheduled'
    assert newvol.flight_type == 'Commercial'
    assert newvol.ifps_registration_mark == 'N12345'
    assert newvol.initial_flight_rule == 'IFR'
    assert newvol.nm_ifps_id == 'IFPS123'
    assert newvol.nm_tactical_id == 'TACT123'

if __name__ == "__main__":
    pytest.main()
